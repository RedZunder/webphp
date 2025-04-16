import json

yoyo={"data":{
    "berga":[1,7,69],"mota":"birgen zantisima"
    } }

outf=open("test.json","w")
json.dump(yoyo,outf,indent=6)
outf.close()

