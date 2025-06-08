import json
from sense_hat import SenseHat
import argparse


sens=SenseHat()


parser=argparse.ArgumentParser(prog='parserProgram')
parser.add_argument('-x',help='set X coordinate of LED')
parser.add_argument('-y',help='set Y coordinate of LED')
parser.add_argument('-r',help='set Y coordinate of LED')
parser.add_argument('-g',help='set Y coordinate of LED')
parser.add_argument('-b',help='set Y coordinate of LED')
parser.add_argument('-s', action="store_true",help='Show current LED matrix')


args=parser.parse_args()


if args.s:
    leds=sens.get_pixels()
    print(leds)

elif args.x and args.y and args.r and args.g and args.b:
    leds=sens.get_pixels()
    leds[int(args.x)+8*int(args.y)]=[int(args.r),int(args.g),int(args.b)]
    sens.set_pixels(leds)
    



