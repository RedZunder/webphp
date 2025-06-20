import json
import argparse
from sense_hat import SenseHat
import math


sens=SenseHat()


parser=argparse.ArgumentParser(prog='parserProgram')

parser.add_argument('-T', nargs='?', const='C', help='Get temperature information', choices=['C','F'])
parser.add_argument('-P', nargs='?', const='hPa', help='Get pressure information', choices=['hPa','mmHg'])
parser.add_argument('-H', nargs='?', const='%', help='Get humidity information', choices=['%','0-1'])

parser.add_argument('-r', nargs='?', const='rad', help='Get roll value', choices=['deg','rad'])
parser.add_argument('-p', nargs='?', const='rad', help='Get pitch value', choices=['deg','rad'])
parser.add_argument('-y', nargs='?', const='rad', help='Get yaw value', choices=['deg','rad'])

args=parser.parse_args()



data_out=[]

if args.T:
	tval=sens.get_temperature()
	if args.T == 'F':
		tval=tval*9/5 +32
	data_out.append({'sensor':'temperature', 'value':tval,'unit':args.T})

if args.P:
	pval=sens.get_pressure()
	if args.P == 'mmHg':
		pval=pval*0.75006157584566
	data_out.append({'sensor':'pressure', 'value':pval,'unit':args.P})

if args.H:
	hval=sens.get_humidity()
	if args.H == '0-1':
		hval=hval/100
	data_out.append({'sensor':'humidity', 'value':hval,'unit':args.H})



orientation = sens.get_orientation_radians()


if args.r:
    rval=orientation['roll']
    if args.r == 'deg':
        rval=rval*180/math.pi
    data_out.append({'sensor':'roll','value':rval,'unit':args.r})
if args.p:
    pval=orientation['pitch']
    if args.p == 'deg':
        pval=pval*180/math.pi
    data_out.append({'sensor':'pitch','value':pval,'unit':args.p})
if args.y:
    yval=orientation['yaw']
    if args.y == 'deg':
        yval=yval*180/math.pi
    data_out.append({'sensor':'yaw','value':yval,'unit':args.y})


print(json.dumps(data_out))



