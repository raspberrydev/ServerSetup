# ServerSetup

`cd cd /etc/update-motd.d`
`sudo nano 0x-motd`

Inside the file:

`#!/bin/bash
php /home/zero/motd.php`

`chmod +x 0x-motd`

inside the file is motd.php in this repo.

add `export PS1="\[\e[36m\]\u\[\e[m\]\[\e[36m\]@\[\e[m\]\[\e[36m\]\h\[\e[m\]:\w \\$ "` 
to /etc/bash.bashrc
