import requests

url='http://192.168.137.48:8000/getpost.php'
headers = {'Accept': 'application/json'}


gett=requests.get(url, headers=headers)
print(gett)

postt=requests.post(url,{'x':1,'y':0,'r':200,'g':200,'b':200})
print(postt)