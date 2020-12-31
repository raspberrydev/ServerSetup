# ServerSetup

`cd /etc/update-motd.d`

Delete any existing files.

`sudo rm *`

`sudo nano 0x-motd`

Inside the file:

```
#!/bin/bash
php /home/zero/motd.php
```

`chmod +x 0x-motd`

Add motd.php (from this repo) into `/home/zero`

Delete the contents of `/etc/motd`

Edit  `~/.bashrc` and add
`export PS1="\[\e[38;5;160m\]\u\[\e[m\]\[\e[38;5;160m\]@\[\e[m\]\[\e[38;5;160m\]\h\[\e[m\]:\w \\$ "` 

Use `source ~/.bashrc` to check if it worked.

