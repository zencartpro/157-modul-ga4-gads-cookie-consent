#######################################################################################################
# GA4/Google Ads/Cookie Consent UNINSTALL - 2023-01-25 - webchills
# NUR AUSFÜHREN FALLS SIE DAS MODUL VOLLSTÄNDIG ENTFERNEN WOLLEN!!!
########################################################################################################

DELETE FROM configuration_group WHERE configuration_group_title = 'GA4/Google Ads/Cookie Consent' LIMIT 1;
DELETE FROM configuration WHERE configuration_key LIKE 'GA4_%';
DELETE FROM configuration_language WHERE configuration_key LIKE 'GA4_%';
DELETE FROM admin_pages WHERE page_key IN ('configGA4GADSCOOKIECONSENT');