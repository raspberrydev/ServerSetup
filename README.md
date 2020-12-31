# ServerSetup

`cd /etc/update-motd.d`

Delete any existing files.

`sudo nano 0x-motd`

Inside the file:

```
#!/bin/bash
php /home/zero/motd.php
```

`chmod +x 0x-motd`

inside the file is motd.php in this repo.

Delete the contents of `/etc/motd`

add `export PS1="\[\e[38;5;160m\]\u\[\e[m\]\[\e[38;5;160m\]@\[\e[m\]\[\e[38;5;160m\]\h\[\e[m\]:\w \\$ "` 
to `~/.bashrc`

Use `source ~/.bashrc` to check if it worked.

