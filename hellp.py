import json

# JSON string
json_data = '''
[
    {
        "sensors": [
            {"name": "temperature", "value": 15, "unit": "celsius"},
            {"name": "pressure", "value": 1.1, "unit": "bar"},
            {"name": "humidity", "value": 15, "unit": "percent"}
        ]
    },
    {
        "IMU": [
            {"name": "gyroscope", "value": [10.5, 0.5, -15.0], "unit": "rad/s"},
            {"name": "accelerometer", "value": [10.5, 0.5, -15.0], "unit": "rad/s"},
            {"name": "compass", "value": 157, "unit": "degrees"}
        ]
    },
    {
        "name": "joystick", "direction": "up", "action": "button_pressed"
    },
    {
        "LEDs": [
            {"LED1": [250, 100, 0]},
            {"LED2": [100, 0, 0]},
            {"LED3": [250, 100, 0]},
            {"LED4": [250, 100, 0]}
        ]
    }
]
'''

# Step 1: Decode JSON data into Python objects (list of dictionaries)
decoded_data = json.loads(json_data)

# Step 2: Print the decoded data
for item in decoded_data:
    # Check for 'sensors' key and print the sensor data
    if 'sensors' in item:
        for sensor in item['sensors']:
            print(f"Sensor Name: {sensor['name']}")
            print(f"Sensor Value: {sensor['value']}")
            print(f"Sensor Unit: {sensor['unit']}")
            print("---")
    
    # Check for 'IMU' key and print IMU data
    if 'IMU' in item:
        for imu in item['IMU']:
            print(f"IMU Name: {imu['name']}")
            print(f"IMU Value: {imu['value']}")
            print(f"IMU Unit: {imu['unit']}")
            print("---")
    
    # Check for 'joystick' key and print joystick data
    if 'name' in item and item['name'] == 'joystick':
        print(f"Joystick Direction: {item['direction']}")
        print(f"Joystick Action: {item['action']}")
        print("---")
    
    # Check for 'LEDs' key and print LED data
    if 'LEDs' in item:
        for led in item['LEDs']:
            for led_name, led_value in led.items():
                print(f"{led_name}: {led_value}")
        print("---")
