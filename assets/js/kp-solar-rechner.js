
jQuery(function($){
  var model = new function(){
    var self = this;
    var firstSelected = false;
    this.periodInYears = 10;
    this.setPeriod = function(period){
      self.periodInYears = period;
    };
    
    this.size = 10;
    this.setSize = function(size){
      self.size = size;
      firstSelected = true;
    };
    
    this.usage = 1500;
    this.setUsage = function(usage){
      self.usage = usage;
      firstSelected = true;
    };
    
    this.disposition = 15;
    this.setDisposition = function(disposition){
      self.disposition = disposition;
      firstSelected = true;
    };
    
    this.direction = 'east';
    this.setDirection = function(direction){
      self.direction = direction;
      firstSelected = true;
    };
    
    this.selfusage = 30;
    this.setSelfusage = function(selfusage){
      self.selfusage = selfusage;
      firstSelected = true;
    };
    
    this.extension = 0;
    this.setExtension = function(extension){
      self.extension = extension;
      firstSelected = true;
    };
    
    this.type='amorph';
    this.setType = function(type){
      self.type = type;
      firstSelected = true;
    };
    
    this.plz = 0;
    this.setPlz = function(plz){
      self.plz = plz;
    };
    
    this.filterInt = function(input, defaultValue){
      defaultValue = defaultValue || 0;   
      var val = parseInt((input+'').replace(/[\D]/g, ''));
      return isNaN(val) ? defaultValue : val;
    };
    
    var calculator = new SolarCalculator();
    this.getResult = function(){
      calculator.setDach(self.size > 0 ? self.size : 1)
      .setPLZ(self.plz)
      .setAusrichtung(self.direction)
      .setNeigung(self.disposition)
      .setVerbrauch((self.usage/100)*self.selfusage)
      .setTechnologie(self.type);
         
      var alignment_value = {
          'north':  '3f022570b8af012d2fca38ac6f7d89ab',
          'south':  '3f03cdf0b8af012d2fcb38ac6f7d89ab',
          'south_west':  '3f03cdf0b8af012d2fcb38ac6f7d89ab',
          'east':   '3f057bd0b8af012d2fcc38ac6f7d89ab',
          'south_east':   '3f057bd0b8af012d2fcc38ac6f7d89ab',
          'west':   '3f073850b8af012d2fcd38ac6f7d89ab',
          'own':    '3f118470b8af012d2fce38ac6f7d89ab'
        };
      
      var contactform = $('form[name="kp-solar-rechner-form"]');
      var container = $('<div id="kp-solar-reechner-antworten"></div>');
      $('body #kp-solar-reechner-antworten').remove();

      container.append('<input type="hidden" name="options[3eff7950b8af012d2fc938ac6f7d89ab][]" value="' + alignment_value[self.direction] + '" />');
      
      container.append('<input type="hidden" name="options[3f4b73c0b8af012d2fdb38ac6f7d89ab][]" value="3f573740b8af012d2fdd38ac6f7d89ab" />');
      container.append('<input type="hidden" name="texts[3f573740b8af012d2fdd38ac6f7d89ab]" value="' + (self.size > 0 ? self.size : 1) + '" />');

      container.append('<input type="hidden" name="notes[Dachneigung][]" value="' + self.disposition + '" />');
      container.append('<input type="hidden" name="notes[Technologie][]" value="' + self.type + '" />');
      container.append('<input type="hidden" name="notes[Eigenverbrauch][]" value="' + ((self.usage/100)*self.selfusage) + 'kWh" />');
      container.append('<input type="hidden" name="notes[Solarspeicher][]" value="' + (self.extension == 0 ? 'nein' : 'ja') + '" />');
      contactform.append(container);
      
      return Math.round(self.periodInYears * (calculator.getVerguetung()));
    };
    
    this.wasFirstSelected = function(){
      return firstSelected;
    };
  }();
  
  /*form setup*/
  $('.kp-solar-rechner-input-custom').val($('.kp-solar-rechner-input-custom').val()+window.location.href);
  
  $('form[name="kp-solar-rechner-form"]').validate({errorElement: 'div',  submitHandler: function(form) {
    form.submit();
    $('#info-overlay-contact').fadeOut();
    $('#info-overlay-result').fadeIn();
    $('#kp-solar-button-calculate').unbind('mouseup');
  }});
  
  /*calculate button*/
  //$('#kp-solar-rechner-plz').focus();
  $('#kp-solar-button-calculate').mouseup(function(){
    var plzElement = $('#kp-solar-rechner-plz');
    if(!plzElement.valid())
      return ;
    
    if(!model.wasFirstSelected())
      return ;
      
      model.setPlz(plzElement.val());
      $('#kp-solar-rechner-display').text(
          model.getResult());
      
    $('#info-overlay-contact').fadeIn();
  });
  
  $('#info-overlay-contact .close').click(function() { 
    $('#info-overlay-contact').fadeOut();
    return false;
  });
  
  /*switch logic*/
  var setupSwitch = function(selector, callback){
    selector.mouseup(function(){
      callback($(this).data('value'));
      selector.unbind('mousemove');
      selector.removeClass('period-selected');
      $(this).addClass('period-selected');
    })
    .mousedown(function(){
      selector.mousemove(function(e){
        selector.removeClass('period-selected');
        $(this).addClass('period-selected');
        callback($(this).data('value'));
      });
    });
  };
  
  /*button row logic*/
  var setupButtonRow = function(selector, callback){
    selector.children().mouseup(function(){
      selector.children().removeClass('selected pressed');
      $(this).addClass('selected');
      
      if($('input', $(this)).length == 1)
        $('input', $(this)).keyup(function(){
           $(this).trigger('mouseup');
        });
      
      var val = $(this).data('value');
      if((''+val).indexOf('#') == 0){
        val = model.filterInt($(val).val());
        $(val).val(val);
      }
      callback(val);
    })
    .mousedown(function(){
      selector.children().removeClass('selected pressed');
      $(this).addClass('pressed');
    });
  };
  
  /*period switch*/
  setupSwitch($('#kp-solar-rechner .period'), model.setPeriod);
  $('#kp-solar-rechner .period-1').addClass('period-selected');
   
  /*button rows*/
  setupButtonRow($('#kp-solar-rechner .button-row.size'), model.setSize);
  setupButtonRow($('#kp-solar-rechner .button-row.usage'), model.setUsage);
  setupButtonRow($('#kp-solar-rechner .button-row.disposition'), model.setDisposition);
  setupButtonRow($('#kp-solar-rechner .button-row.direction'), model.setDirection);
  setupButtonRow($('#kp-solar-rechner .button-row.selfusage'), model.setSelfusage);
  setupButtonRow($('#kp-solar-rechner .button-row.extension'), model.setExtension);
  setupButtonRow($('#kp-solar-rechner .button-row.type'), model.setType);
    
  /*selfusage condition extension*/
  var conditionalButtons = $('.button-row.selfusage .disabled');
  $('.simple-button.extension-yes').mouseup(function(){
    conditionalButtons.removeClass('disabled');
  });
  $('.simple-button.extension-no').mouseup(function(){
    conditionalButtons.addClass('disabled');
  });
  $('.selfusage .first, .selfusage .second, .selfusage .third').mouseup(function(){
    $('.extension .extension-no').trigger('mouseup');
  });
  
  /*popups*/
  $('#kp-solar-rechner .info-popup').mouseover(function() { 
     var el = $($(this).attr('href'), $(this).parent());
      el.css({top: ($(this).position().top - el.height() - 24) +'px',
              left: $(this).position().left+'px',
              opacity: 1});
      el.fadeIn({
        queue: false
      });
  })
  .mouseleave(function() { 
      $($(this).attr('href'), $(this).parent()).fadeOut({
        queue: false,
        duration: 200
      });
  })
  .click(function(){
    $(this).trigger('mouseover');
    return false;
  });
  
  /*overlays*/
  $('#info-overlay-calculation-link').click(function() { 
    var el = $($(this).attr('href'), $(this).parent());
    el.fadeIn();
    return false;
  });
  
  $('#info-overlay-calculation .close').click(function() { 
    $('#info-overlay-calculation').fadeOut();
    return false;
  });
  
  /*jquery validate*/
  $.validator.addMethod('more_chars_then_digets', function(value, element, param){
    value = value || ''; 
    return value.replace(/[^\D]/g, '').length>value.replace(/\D/g, '').length;
  });
  $.validator.addMethod('max_digets', function(value, element, param){
    value = value || '';
    return value.replace(/\D/g, '').length<=param;
  });
  $.validator.addMethod('name_req', $.validator.methods.required );
  $.validator.addMethod('name_min', function(value, element) {
    return ($.validator.methods.minlength.call(this, value, element, 2) && !$(element).hasClass('predefined'));
  }); 
  $.validator.addMethod('surname_req', $.validator.methods.required );
  $.validator.addMethod('surname_min', function(value, element) {
    return ($.validator.methods.minlength.call(this, value, element, 2) && !$(element).hasClass('predefined'));
  });
  $.validator.addMethod('zip_req', $.validator.methods.required );
  $.validator.addMethod('zip_val', $.validator.methods.digits );
  $.validator.addMethod('zip_min', function(value, element) {
    return $.validator.methods.minlength.call(this, value, element, 4);
  });
  $.validator.addMethod('zip_max', function(value, element) {
    return $.validator.methods.maxlength.call(this, value, element, 5);
  });
  $.validator.addMethod('mail_req', $.validator.methods.required );
  $.validator.addMethod('mail_val', $.validator.methods.email );
  $.validator.addMethod('phone_req', $.validator.methods.required );
  $.validator.addMethod('phone_min', function(value, element) {
    return $.validator.methods.minlength.call(this, value, element, 6);
  });
  $.validator.addMethod('phone_val', function(value, element) {
    return this.optional(element) || /(^[0-9\(\)\/\+\s-]+$)/.test(value);
  });

  $.validator.addClassRules({
    v_name: {name_req: true, name_min: true, max_digets: 1, more_chars_then_digets: true },
    v_surname: {surname_req: true, surname_min: true, max_digets: 1, more_chars_then_digets: true },
    v_zip: {zip_req: true, zip_val: true, zip_min: true, zip_max: true },
    v_phone: {phone_req: true, phone_val: true, phone_min: true },
    v_mail: {mail_req: true, mail_val: true },
    v_mail_opt: { mail_val: true }
  });
  
  $.extend($.validator.messages, {
    name_req:'',name_min:'',surname_req:'',surname_min:'',zip_req:'',zip_val:'',zip_min:'',zip_max:'',mail_req:'',mail_val:'', phone_req:'',phone_val:'',phone_min:'', more_chars_then_digets:'', max_digets:''
  });
});