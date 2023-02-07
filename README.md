# 157-modul-ga4-gads-cookie-consent
Google Analytics GA4 / Google Ads / Cookie Consent für Zen Cart 1.5.7 deutsch

Hinweis: 
Freigegebene getestete Versionen für den Einsatz in Livesystemen ausschließlich unter Releases herunterladen:
* https://github.com/zencartpro/157-modul-ga4-gads-cookie-consent/releases

Mit diesem Modul kann Google Analytics GA4 Tracking im Shop integriert werden. Falls auch Google Ads verwendet wird, kann optional ein Conversion Tracking für Google Ads aktiviert werden.

Um Google Analytics GA4 DSGVO-konform und EU Cookie Richtlinien konform verwenden zu können, ist ein auf https://www.privacypolicies.com/cookie-consent/ basierendes Cookie Consent Tool enthalten, das die entprechenden Scripts blockiert, wenn der Verwendung von Tracking und Targeting nicht zugestimmt wurde.

Das Cookie Consent Banner ist multilingual, so dass in mehrsprachigen Shops der Cookie Hinweis in der passenden Sprache erscheint.

Layout und Anzeigestil des Cookie Consent Banners können in der Shopadministration geändert werden.

Auch die Eingabe von GA4 ID, Google Ads ID und Google Ads Conversion Label sind admingesteuert.
Es ist kein manuelles Einfügen irgendwelcher Scripts in irgendwelchen Shopdateien nötig, das Modul ändert lediglich eine bestehende Shopdatei.

* Wenn Sie lediglich das Cookie Consent Banner verwenden wollen, dann ist das natürlich möglich, lassen Sie Google Analytics, Google Analytics Conversion Tracking und Google Ads einfach deaktiviert und aktivieren Sie nur Cookie Consent
* Wenn Sie lediglich das Cookie Consent Banner und Google Analytics verwenden wollen, dann ist das natürlich möglich, lassen Sie Google Ads einfach deaktiviert und aktivieren Sie nur Cookie Consent und Google Analytics und optional Google Analytics Conversion Tracking.
* Wenn Sie lediglich das Cookie Consent Banner und Google Ads verwenden wollen (für das Seitenaufruftracking verwenden Sie z.B. Matomo), dann ist das natürlich möglich, lassen Sie Google Analytics einfach deaktiviert und aktivieren Sie nur Cookie Consent und Google Ads.

Genereller Hinweis:
* Falls Sie Google Analytics, Google Analytics Conversion Tracking und Google Ads Conversion Tracking aktivieren, passen Sie Ihre Datenschutzerklärung entsprechend an!
* Betreiben Sie diese Dinge keinesfalls ohne korrekte Datenschutzerklärung und ohne aktiviertes Cookie Consent Tool! 

Hinweis zum Google Analytics Tracking:
* Es wird lediglich Google Analytics GA4 unterstützt!
* Es ist also zwingend eine Google Analytics GA4 Property erforderlich, deren ID (beginnend mit G-) Sie in der Shopadministration angeben müssen.
* Wenn nur Google Analytics Tracking aktiviert wird, werden lediglich die Seitenaufrufe erfasst, es erfolgt dann kein erweitertes E-Commerce Tracking irgendwelcher Events.
* Wird Google Analytics auf true gestellt, enthält der Quellcode zusätzlich auch eine Unterstützung für das Google Analytics Opt-Out Cookie, das häufig in Datenschutzerklärungen verwendet wird. Der dort vorgesehene Link "Google Analytics deaktivieren" wird also unterstützt.

Hinweis zum Google Analytics Conversion Tracking:
* Wenn auch das Google Analytics Conversion Tracking aktiviert wird, dann wird auf der checkout_success Seite das GA4 Standardevent purchase generiert und mit den entsprechenden Werten an Google Analytics übermittelt.
* Übermittelt werden für die Gesamtbestellung transaction_id, affiliation, value, shipping, currency
* Und die einzelnen Artikel mit: item_id, item_name, item_category, list_position, item_variant, price, quantity
* Andere Events als purchase werden nicht erfasst. 

Hinweis zum Google Ads Conversion Tracking:
* Sie müssen in Google Ads unter Tools und Einstellungen > Conversions eine Conversion Aktion für den Kaufabschluss angelegt haben.
Es wird lediglich auf der checkout_success Seite der Bestellwert und die Bestellnummer erfasst und an Google Ads übermittelt.
Die Conversions sind dann in Google Ads ersichtlich. Ein Tracking weiterer Events findet nicht statt.

Hinweise zur Cookie Consent Banner Funktionalität:
* Die Funktionalität ist detailliert beschrieben auf:
https://www.privacypolicies.com/cookie-consent/

Damit dieses Tool die entsprechenden Javascripts bei Nicht-Zustimmung blocken kann, werden sie nicht einfach mit <script>irgendwas</script> aufgerufen, sondern mit z.B.
* <script type="text/plain" data-cookie-consent="tracking">irgendwas</script> 
oder
* <script type="text/plain" data-cookie-consent="targeting"></script> 
Dieses Modul bindet die Javascripts für Google Analytics und Google Ads bereits so ein, falls das Cookie Consent Tool aktiviert ist.
Es sind also keinerlei zusätzliche Änderungen in irgendwelchen Dateien nötig.

Sollten Sie in Ihrem Shop aber noch andere Trackingscripts verwenden, dann müssen Sie deren Aufrufe entsprechend anpassen, damit sie von dem Tool erfasst werden können. 

Auf den Seiten Datenschutz, AGB, Impressum und Wegen Wartungsarbeiten geschlossen wird das Cookie Consent Banner nicht geladen, um stets einen freien Zugang zu diesen Seiten zu ermöglichen. 

Credits:

Dieses Modul verwendet die Cookie Consent Lösung von PrivacyPolicies:
* https://www.privacypolicies.com/cookie-consent/

Das Google Analytics GA4 Conversion Tracking basiert auf der Lösung von kanine:
* https://github.com/kanine/zencart_enhanced_analytics
