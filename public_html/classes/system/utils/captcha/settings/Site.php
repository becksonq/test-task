<?php
 namespace UmiCms\Classes\System\Utils\Captcha\Settings;class Site implements iSettings, \iUmiRegistryInjector {use \tUmiRegistryInjector;private $domainId;private $langId;public function __construct($v72ee76c5c29383b7c9f9225c1fa4d10b, $vf585b7f018bb4ced15a03683a733e50b, \iRegedit $va9205dcfd4a6f7c2cbe8be01566ff84a) {if (!is_numeric($v72ee76c5c29383b7c9f9225c1fa4d10b) || !is_numeric($vf585b7f018bb4ced15a03683a733e50b)) {throw new \ErrorException(getLabel('error-wrong-domain-and-lang-ids'));}$this->domainId = $v72ee76c5c29383b7c9f9225c1fa4d10b;$this->langId = $vf585b7f018bb4ced15a03683a733e50b;$this->setRegistry($va9205dcfd4a6f7c2cbe8be01566ff84a);}public function shouldUseSiteSettings() {return (bool) $this->getRegistry()->get("{$this->getPrefix()}/use-site-settings");}public function setShouldUseSiteSettings($v327a6c4304ad5938eaf0efb6cc3e53dc) {$this->getRegistry()->set("{$this->getPrefix()}/use-site-settings", $v327a6c4304ad5938eaf0efb6cc3e53dc);return $this;}public function getStrategyName() {if ($this->isRecaptchaEnabled()) {return 'recaptcha';}if ($this->isClassicEnabled()) {return 'captcha';}return 'null-captcha';}public function setStrategyName($vb068931cc450442b63f5b3d276ea4297) {$this->setClassicEnabled(false)    ->setRecaptchaEnabled(false);if ($vb068931cc450442b63f5b3d276ea4297 === 'recaptcha') {$this->setRecaptchaEnabled(true);}elseif ($vb068931cc450442b63f5b3d276ea4297 === 'captcha') {$this->setClassicEnabled(true);}return $this;}protected function isClassicEnabled() {return (bool) $this->getRegistry()->get("{$this->getPrefix()}/enable-classic");}protected function setClassicEnabled($v327a6c4304ad5938eaf0efb6cc3e53dc) {$this->getRegistry()->set("{$this->getPrefix()}/enable-classic", $v327a6c4304ad5938eaf0efb6cc3e53dc);return $this;}protected function isRecaptchaEnabled() {return (bool) $this->getRegistry()->get("{$this->getPrefix()}/enable-recaptcha");}protected function setRecaptchaEnabled($v327a6c4304ad5938eaf0efb6cc3e53dc) {$this->getRegistry()->set("{$this->getPrefix()}/enable-recaptcha", $v327a6c4304ad5938eaf0efb6cc3e53dc);return $this;}public function shouldRemember() {return (bool) $this->getRegistry()->get("{$this->getPrefix()}/remember");}public function setShouldRemember($v327a6c4304ad5938eaf0efb6cc3e53dc) {$this->getRegistry()->set("{$this->getPrefix()}/remember", $v327a6c4304ad5938eaf0efb6cc3e53dc);return $this;}public function getDrawerName() {return (string) $this->getRegistry()->get("{$this->getPrefix()}/drawer");}public function setDrawerName($vb068931cc450442b63f5b3d276ea4297) {$this->getRegistry()->set("{$this->getPrefix()}/drawer", $vb068931cc450442b63f5b3d276ea4297);return $this;}public function getSitekey() {return (string) $this->getRegistry()->get("{$this->getPrefix()}/recaptcha-sitekey");}public function setSitekey($v4d472c8c75568efd59744f7399f271f7) {$this->getRegistry()->set("{$this->getPrefix()}/recaptcha-sitekey", $v4d472c8c75568efd59744f7399f271f7);return $this;}public function getSecret() {return (string) $this->getRegistry()->get("{$this->getPrefix()}/recaptcha-secret");}public function setSecret($v5ebe2294ecd0e0f08eab7690d2a6ee69) {$this->getRegistry()->set("{$this->getPrefix()}/recaptcha-secret", $v5ebe2294ecd0e0f08eab7690d2a6ee69);return $this;}private function getPrefix() {return "//settings/captcha/{$this->domainId}/{$this->langId}";}}