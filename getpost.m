url='http://192.168.137.48:8000/getpost.php';

gett=webread(url, weboptions('ContentType','text'))

postt=webwrite(url,'x',3,'y',0,'r',100,'g',7,'b',69,weboptions('ContentType','text'))
