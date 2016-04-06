## summary

when `git push` to gitlab or github.  
git GUI will call webhook and auto deploy current version to Specified space.

and  `deploy.php` will help to deploy all of things.

## file

- generate.php
  - generate 'TOKEN' and 'WEBHOOK LINK'.
  - `generate.php?folder_name=your_project_name` : need fill it on gitlab webhook
- config.php
  - fill 'TOKEN' in suitable position.
- deploy.php
  - `git pull`
  - Generate `your_project_name/log.txt`
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
