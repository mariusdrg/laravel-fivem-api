## mariusdrg/laravel-fivem-api
Package which allows you to fetch GTA FiveM Servers information related to their online players and general properties as JSON array.

## Dependencies
PHP >= 8.0<br>
illuminate/support >=5.4<br>
guzzlehttp/guzzle >=7.0

## Installation

### To install with Composer simply use:
```composer require mariusdrg/laravel-fivem-api```

## ServiceProvider in Laravel

```use Mariusdrg\LaravelFivemApi\Services\LFAService;```

## Functions

```getServer()``` - will return you entire JSON with server information (resources, players, server properties)<br>
```getServerInfo()``` - will return only server properties such as: server name, banners, website, description etc.<br>
```getLocale()``` - will return server locale language ISO 639-1 code<br>
```getResources()``` - will return the list of resources<br>
```getLicenseKeyToken()``` - will return server's license key token<br>
```getAllPlayers()``` - will return all online players and their information (endpoint, id, identifiers, name and ping)<br>
```getOnlinePlayers()``` - will return ONLY the number of total players<br>
```getMaxPlayers()``` - will return the number of max players allowed by server's properties
All of them based on API GET responses received from <code>http://0.0.0.0:30120/x.json</code>.


## Usage

```
$client = new LFAService("127.0.0.1"); //replace 127.0.0.1 with your server's IP | Port is set by default as 30120
//or
$client = new LFAService("127.0.0.1", 30121); //second parameter allows you to set a custom Port if necessary

$client->getServer();
```

Example
```
namespace App\Http\Controllers;

use Mariusdrg\LaravelFivemApi\Services\LFAService;

class IndexController extends Controller
{
    public function index() {
        $lfa = new LFAService("127.0.0.1");
        return view('index', ['server' => $lfa->getServer()]);
    }
}
```

The response will look like:
```
{
    "enhancedHostSupport": true,
    "icon": "iVBORw0KGgoAAAANSUhEUgAAAGAAAABgCAIAAABt",
    "requestSteamTicket": "off",
    "resources": ["hardcap","rcore_bowling","easy_allowlist","safecracker","boatdealer"],
    "server": "FXServer-master SERVER v1.0.0.6683 win32",
    "vars": {
        "JD_logs": "V3.0.4",
        "banner_connecting": "https://i.imgur.com/YYY.png",
        "banner_detail": "https://i.imgur.com/XXX.png",
        "gamename": "gta5",
        "locale": "en-US",
        "onesync_enabled": "true",
        "sv_enforceGameBuild": "2502",
        "sv_enhancedHostSupport": "true",
        "sv_lan": "false",
        "sv_licenseKeyToken": "3443444x0000000000000000_4627049:0e82a33e8f0c1ab0b5b95d04f48e235099054ecebad8ah8aed4a8951a8a218b8",
        "sv_maxClients": "128",
        "sv_projectDesc": "^5wcodero",
        "sv_projectName": "^5In-House Development |  ^5Drugs and Heists  |  ^4Wars  |  ^5Active Gangs  |  ^4Active Staff  |  ^5Exclusive Scripts  | 16+",
        "sv_pureLevel": "1",
        "sv_scriptHookAllowed": "false",
        "tags": "roleplay, rp, qbcore, qb-core, serious",
        "txAdmin-version": "6.0.1"
    },
    "version": 1683688455
}
```