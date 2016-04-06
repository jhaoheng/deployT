## how to use
1. copy `sample_demo` to upper folder.
  - ex:
    - Desktop/[this tool folder]
    - Desktop/sample_demo
2. in `sample_demo/`，`git clone sample.git sample_deploy`
  - `git clone sample.git sample_deploy`
  - `git clone sample.git sample_work`
  - `echo "test" >> sample_work/log.txt` && `cd sample_work` && `git add .` && `git commit -m "add"` && `git push origin master`
3. run `deploy.php?token=MTQ1OTkzNTU5N3NhbXBsZTE0NTk5MzU1OTc` in your website
4. finally
  - watch log in <tool>/[sample_deploy]/log.txt
  - the sample_deploy is changed.

## trouble shooting

- `Thank you!!`
  - token Error
- `Error : your deploy repo not ready to set and init.`
  - please redo [how to use]
