## summary

When `git push` to gitlab or github.  
git GUI will call webhook and auto deploy current version to Specified space.

## Test ENV

- Linux DiskStation 3.10.77 #7321 SMP Wed Mar 23 11:47:12 CST 2016 x86_64 GNU/Linux synology_cedarview_713+
	- git 2.8
	- apache 2.2
	- php 5.6
- mac osx 10.11.4
	- git 2.6.4
	- apache 2.2
	- php 7.0

## Notice : setting required

- who use : `whoami` , may get apache or http
	- use it by php bash_exec.
- generate  ssh key : `sudo -u apache ssh-keygen -t rsa`
- known_hosts : sudo -u apache ssh <ssh host>
	- gitlab.com
	- github.com


## file

- generate.php : `generate.php?folder_name=your_project_name`
  - generate 'Token' and 'Webhook link'.
	  - Token : Take it set to config.php.
	  - Webhook link : Put it to 'git GUI service'
- config.php
  - setting token and deploy path.
- deploy.php : Will generate log and exec `git pull` to specified path.

- sample_demo/
  - follow this sample_demo/readme.md will help to know more about it.

## How to use

1. 產生 token / webhook link
2. 建立 deploy 路徑上的 git
3. 設定 token 於 git GUI config(gitlab)
  - log path
  - repo path
4. 在應用軟體上，設定 webhook
5. 完成
