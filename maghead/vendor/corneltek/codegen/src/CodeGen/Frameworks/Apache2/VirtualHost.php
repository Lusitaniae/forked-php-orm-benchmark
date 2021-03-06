<?php
namespace CodeGen\Frameworks\Apache2;
class VirtualHost
    extends \CodeGen\Frameworks\Apache2\VirtualHostDirectiveGroup
{
    public function setDocumentRoot($entry)
    {
        $this->documentRoot = $entry;
    }
    public function getDocumentRoot()
    {
        return $this->documentRoot;
    }
    public function setServerName($entry)
    {
        $this->serverName = $entry;
    }
    public function getServerName()
    {
        return $this->serverName;
    }
    public function setServerAdmin($entry)
    {
        $this->serverAdmin = $entry;
    }
    public function getServerAdmin()
    {
        return $this->serverAdmin;
    }
    public function setServerPath($entry)
    {
        $this->serverPath = $entry;
    }
    public function getServerPath()
    {
        return $this->serverPath;
    }
    public function addServerAlias($entry)
    {
        $this->serverAliases[] = $entry;
    }
    public function removeServerAlias($entry)
    {
        $pos = array_search($entry, $this->serverAliases, true);
        if ($pos !== -1) {
            unset($this->serverAliases[$pos]);
            return true;
        }
        return false;
    }
    public function setServerAliases(array $entries)
    {
        $this->serverAliases = $entries;
    }
    public function getServerAliases()
    {
        return $this->serverAliases;
    }
    public function setCustomLog($entry)
    {
        $this->customLog = $entry;
    }
    public function getCustomLog()
    {
        return $this->customLog;
    }
    public function setErrorLog($entry)
    {
        $this->errorLog = $entry;
    }
    public function getErrorLog()
    {
        return $this->errorLog;
    }
    public function setProxyPreserverHost($entry)
    {
        $this->proxyPreserverHost = $entry;
    }
    public function getProxyPreserverHost()
    {
        return $this->proxyPreserverHost;
    }
    public function setProxyPass($entry)
    {
        $this->proxyPass = $entry;
    }
    public function getProxyPass()
    {
        return $this->proxyPass;
    }
    public function setProxyPassReverse($entry)
    {
        $this->proxyPassReverse = $entry;
    }
    public function getProxyPassReverse()
    {
        return $this->proxyPassReverse;
    }
    public function setRewriteEngine($entry)
    {
        $this->rewriteEngine = $entry;
    }
    public function getRewriteEngine()
    {
        return $this->rewriteEngine;
    }
    public function setRewriteBase($entry)
    {
        $this->rewriteBase = $entry;
    }
    public function getRewriteBase()
    {
        return $this->rewriteBase;
    }
    public function addRewriteDirective($entry)
    {
        $this->rewriteDirectives[] = $entry;
    }
    public function removeRewriteDirective($entry)
    {
        $pos = array_search($entry, $this->rewriteDirectives, true);
        if ($pos !== -1) {
            unset($this->rewriteDirectives[$pos]);
            return true;
        }
        return false;
    }
    public function setRewriteDirectives(array $entries)
    {
        $this->rewriteDirectives = $entries;
    }
    public function getRewriteDirectives()
    {
        return $this->rewriteDirectives;
    }
    public function addEnv($key, $entry)
    {
        $this->env[$key] = $entry;
    }
    public function removeEnv($key)
    {
        unset($this->env[$key]);
        return true;
    }
    public function setEnv(array $entries)
    {
        $this->env = $entries;
    }
    public function getEnv()
    {
        return $this->env;
    }
}
