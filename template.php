<div id="kp-solar-rechner">
  <a href="www.kaeuferportal.de" target="_blank" id="kp-solar-rechner-headline"></a>
  
  <div id="kp-solar-rechner-display">0</div>
  
  <iframe name="hidden-post-frame" style="display:none; visibility:hidden; "></iframe>
  <form method="post" accept-charset="UTF-8" target="hidden-post-frame" name="kp-solar-rechner-form"  action="http://www.kaeuferportal.de/solaranlagen/angebot-erhalten/3?class=wordpress-plugin">
    <input type="text" class="v_zip" id="kp-solar-rechner-plz" value="10???" name="kaeufer_kontakt[postleitzahl]"/>
    
    <input type="hidden" value="30" name="produktanfrage_produkt_id">
    <input type="hidden" value="solaranlagen" name="callname">
    <input type="hidden" class="kp-solar-rechner-input-custom" value="anfrage-element=wordpress-plugin&amp;form-referer=" name="custom">
    <input type="hidden" value="http://www.kaeuferportal.de/lp/solaranlagen/angebot-erhalten/angebot-bestaetigt" name="confirm_url">
    <input type="hidden" value="✓" name="utf8">
    
    <div id="info-overlay-contact" class="hidden overlay-container"><?php $this->img('close.png', 'close', 'Schliessen'); ?>
      <?php $this->img('sidebar.png', 'sidebar', 'Seitenbild'); ?>
      Die Installation einer Solaranlage scheint für Sie <strong>hochrentabel.</strong>
      
      <h1>Jetzt Solaranlage finden!</h1>
      Lassen Sie die vorläufige Prognose vom Fachhändler vor Ort <br/>
      überprüfen und erhalten Sie passende Solaranlagen-Angebote.
      
      <fieldset>
        <div class="row1 details required anrede">
    				<label>Anrede</label>
    					<input style="border: medium none;" name="kaeufer_kontakt[anrede]" value="true" class="male" checked="checked" type="radio"/><span class="label">Herr</span>
    					<input style="border: medium none;" name="kaeufer_kontakt[anrede]" value="false" class="female" type="radio"/><span>Frau</span>
        </div>
        <div class="row1 details required names">
            <label>Vorname </label>
            <input type="text" class="v_name" id="kaeufer_kontakt_vorname" name="kaeufer_kontakt[vorname]" size="30">
        </div>
        <div class="row1 details required names">
            <label>Nachname </label>
           <input type="text" class="v_name" id="kaeufer_kontakt_nachname" name="kaeufer_kontakt[nachname]" size="30">
        </div>
        <div class="row1 details required">
            <label>Telefon </label>
            <input type="text" class="v_phone" id="kaeufer_kontakt_telefon" name="kaeufer_kontakt[telefon]"> 
        </div>
        <div class="row1 details required">
            <label>E-Mail </label>
            <input type="text" class="v_mail" id="kaeufer_kontakt_email" name="kaeufer_kontakt[email]" size="30">
        </div>
      </fieldset>
      <button type="submit" id="kp-solar-button-submit"> </button> 
    </div>
  </form>
  
  <div id="info-overlay-result" class="hidden overlay-container">
    <h1>Vielen Dank!<br/>
    Wir haben Ihre Anfrage erhalten.</h1> 
    <p>In Kürze wird Sie ein Mitarbeiter unseres Solaranlagen-Teams kontaktieren, um gemeinsam mit Ihnen die passenden Anbieter für Ihre Anfrage auszuwählen.</p>
    <?php $this->img('siegel.png', '', 'Siegel'); ?>
  </div>  
  
  <div class="period period-1" data-value="5"></div>
  <div class="period period-2" data-value="10"></div>
  <div class="period period-3" data-value="20"></div>
  
  <a class="info-popup plz" href="#info-popup-plz"> </a>
  <div id="info-popup-plz" class="hidden info-popup-container">Postleitzahl - Die Eingabe einer korrekten PLZ ist essentiell für eine exakte Lokalisierung des Standpunktes und die daraus resultierende Berechnung des Sonneneinstrahlpotenziales. Jede Region in der Bundesrepublik hat eine unterschiedliche Sonneinstrahlung.<div></div></div>
  
  <a class="info-popup size" href="#info-popup-size"> </a>
  <div id="info-popup-size" class="hidden info-popup-container">Fläche der Solaranlage - Diese Angabe richtet sich nach der zur Verfügung stehenden Dachfläche, abzüglich der Flächen für Schornstein und Dachflächenfenster.<div></div></div>
  <div class="button-row size">
    <div class="button" data-value="10">10<br/>m&sup2;</div><div class="button" data-value="50">50<br/>m&sup2;</div><div class="button" data-value="100">100<br/>m&sup2;</div><div class="button" data-value="150">150<br/>m&sup2;</div><div class="button" data-value="#solar_input_size"><input id="solar_input_size" type="text" placeholder="?"/><br/>m&sup2;</div>
  </div>
   
  <a class="info-popup usage" href="#info-popup-usage"> </a>
  <div id="info-popup-usage" class="hidden info-popup-container">Stromverbrauch - Der jährliche Stromverbrauch kann der letzten Abrechnung entnommen werden. Eine Orientierung geben diese Werte: Singlehaushalt 1.500 kWh, Zwei-Personen-Haushalt 2.500 kWh, Familienhaushalt 4.500 kWh.<div></div></div>
  <div class="button-row usage">
    <div class="button" data-value="1500">1.500<br/>kWh</div><div class="button" data-value="2500">2.500<br/>kWh</div><div class="button" data-value="3500">3.500<br/>kWh</div><div class="button" data-value="5000">5.000<br/>kWh</div><div class="button" data-value="#solar_input_usage"><input id="solar_input_usage" type="text" placeholder="?"/><br/>kWh</div>
  </div>
  
  <a class="info-popup disposition" href="#info-popup-disposition"> </a>
  <div id="info-popup-disposition" class="hidden info-popup-container">Dachneigung – Die optimale Dachneigung liegt zwischen 30° - 35°. Montagegerüsten gleichen andere Dachneigungen aus. <div></div></div>
  <div class="button-row disposition">
    <div class="button single-row" data-value="0">0&deg;</div><div class="button single-row" data-value="15">15&deg;</div><div class="button single-row" data-value="30">30&deg;</div><div class="button single-row" data-value="45">45&deg;</div><div class="button" data-value="#solar_input_disposition"><input id="solar_input_disposition" type="text" placeholder="?"/>Grad</div>
  </div>
  
  <a class="info-popup direction" href="#info-popup-direction"> </a>
  <div id="info-popup-direction" class="hidden info-popup-container">Dachausrichtung – Ein Dach mit Südlage erzielt die höchsten Erträge. <div></div></div>
  <div class="button-row direction">
    <div class="button single-row" data-value="west">West</div><div class="button" data-value="south_west">Süd/<br/>West</div><div class="button single-row" data-value="south">Süd</div><div class="button" data-value="south_east">Süd/<br/>Ost</div><div class="button single-row" data-value="east">Ost</div>
  </div>
  
  <a class="info-popup selfusage" href="#info-popup-selfusage"> </a>
  <div id="info-popup-selfusage" class="hidden info-popup-container">Eigenverbrauch - Wer seinen Strom selbst verbraucht, profitiert gleich doppelt. Er wird unabhängig von Preiserhöhungen, schont die Umwelt und spart viel Geld.<div></div></div>
  <div class="button-row selfusage">
    <div class="button single-row first" data-value="10">10&#37;</div><div class="button single-row second" data-value="20">20&#37;</div><div class="button single-row third" data-value="30">30&#37;</div><div class="button single-row disabled" data-value="50">50&#37;</div><div class="button single-row disabled" data-value="70">70&#37;</div>
  </div>
  
  <a class="info-popup extension" href="#info-popup-extension"> </a>
  <div id="info-popup-extension" class="hidden info-popup-container">Solarspeicher – Moderne Speichersysteme können den gesamten am Tage produzierten Sonnenstrom speichern und bei Bedarf wieder abgeben. Dadurch ist ein Eigenverbrauch von bis zu 75 Prozent möglich. <div></div></div>
  <div class="button-row extension">
    <div class="simple-button extension-no" data-value="0">kein Solarspeicher</div><div class="simple-button extension-yes" data-value="1">Solarspeicher</div>
  </div>
  
  <a class="info-popup type" href="#info-popup-type"> </a>
  <div id="info-popup-type" class="hidden info-popup-container"><b>Monokristalline</b> Module haben einen sehr hohen Wirkungsgrad (18%) und sind preisintensiv. <b>Polykristalline</b> Module haben einen normalen Wirkungsgrad (11-14%) und günstiger als monokristalline Module. <b>Amorphe</b> Module haben mit Abstand die geringsten Herstellungskosten und einen niedrigeren Wirkungsgrad (6-8%).<div></div></div>
  <div class="button-row type">
    <div class="simple-button type-amorph" data-value="layer">Amorph</div><div class="simple-button type-poly" data-value="polycrystalline">Polykristallin</div><div class="simple-button type-mono" data-value="crystalline">Monokristallin</div>
  </div>  
    
  <div id="kp-solar-button-calculate"></div>  
    
  <a class="info-overlay calculation" id="info-overlay-calculation-link" href="#info-overlay-calculation"><?php $this->img('delta.png', '', 'Dreieck'); ?> <span>Informationen zur Berechnung</span></a>
  <div id="info-overlay-calculation" class="hidden overlay-container"><?php $this->img('close.png', 'close', 'Schliessen'); ?>
    <h1>Berechnungsdetails</h1>
    <br/>
    <b>Strompreis:</b> 26 Cent/kWh<br/>
    <br/>
    <b>Jährliche Strompreiserhöhung:</b> 2,02%<br/>
    <br/>
    <b>Anschaffungskosten:</b> Durch die starken Preisunterschiede zwischen den Anbietern werden die Investitionskosten nicht mitberechnet. Für eine kostenlose und unverbindliche Beratung steht nach der Berechnung ein Kontaktformular zur Verfügung.<br/>
    <br/>
    <b>Einspeisevergütung:</b> ca. 0,14 Cent/kWh<br/>
    <br/>
    <b>Stromverbrauch im Jahr:</b> gemittelte Werte basierend auf der Personenhaushaltsgröße<br/>
    <br/>
  </div>
   
  <div id="hidden-for-preload" style="display:none; visibility:hidden; ">
    <?php $this->img('button_calc_black_pressed.png', '', 'Button preload'); ?>
    <?php $this->img('button_calc_orange.png', '', 'Button preload'); ?>
    <?php $this->img('button_orange_bg.png', '', 'Button preload'); ?>
  </div> 
</div>