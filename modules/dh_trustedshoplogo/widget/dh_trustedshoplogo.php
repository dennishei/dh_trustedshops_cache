<?php
/**
 * User: dennis.heidtmann@koffer-direkt.de
 * Date: 28.05.2013
 * Time: 11:06
 */

class dh_trustedshoplogo extends oxWidget
{

    /**
     * Widget Template Name
     * @var string
     */
    protected $_sThisTemplate = 'dh_trustedshoplogo.tpl';


    /**
     * Trusted Shops ID
     *
     * @var string
     */
    protected $_sDH_TrustedShop_ID = null;


    /**
     * Speicherpfad für die Cache Datei
     *
     * @var string
     */
    protected $_sFileCachePath = "modules/dh_trustedshoplogo/cache/";


    /**
     * Dateiname für die Grafik
     *
     * @var string
     */
    protected $_sFileName = 'trusted-shops-logo.gif';


    public function getTrustedShopLogo()
    {
        startProfile(__FUNCTION__);

        $sFileFullPath = $this->_sFileCachePath . $this->_sFileName;

        if (!$this->_cachecheck($sFileFullPath, 10800)) {
            $current = file_get_contents("https://www.trustedshops.com/bewertung/widget/widgets/" . $this->getTSID() . ".gif");
            file_put_contents($sFileFullPath, $current);
            // error_log("new Trusted Shop widget saved!");
        } else {
            // error_log("old Trusted Shop widget loaded!");
        }
        stopProfile(__FUNCTION__);

        return "/" . $this->_sFileCachePath . $this->_sFileName;
    }


    /**
     * TS Shop ID aus Modulkonfiguration holen
     *
     * @return string
     */
    public function getTSID()
    {
        $myconfig = oxRegistry::get("oxConfig");
        $this->_sDH_TrustedShop_ID = $myconfig->getConfigParam("dh_Trusted_Shops_ID");

        return $this->_sDH_TrustedShop_ID;
    }

    /**
     * Cache zu alt ?
     *
     * @param     $filename_cache
     * @param int $timeout
     *
     * @return bool
     */
    private function _cachecheck($filename_cache, $timeout = 10800)
    {
        if (file_exists($filename_cache)) {
            $timestamp = filemtime($filename_cache); // Seconds
            if (mktime() - $timestamp < $timeout) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

}