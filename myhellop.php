<?php
// JSON string
$json_data = '
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
';

// Step 1: Decode JSON data into PHP arrays
$decoded_data = json_decode($json_data, true); // true to get associative arrays

// Step 2: Iterate and print the decoded data
foreach ($decoded_data as $item) {
    // Check for 'sensors' key and print sensor data
    if (isset($item['sensors'])) {
        foreach ($item['sensors'] as $sensor) {
            echo "Sensor Name: " . $sensor['name'] . "\n";
            echo "Sensor Value: " . $sensor['value'] . "\n";
            echo "Sensor Unit: " . $sensor['unit'] . "\n";
            echo "---\n";
        }
    }

    // Check for 'IMU' key and print IMU data
    if (isset($item['IMU'])) {
        foreach ($item['IMU'] as $imu) {
            echo "IMU Name: " . $imu['name'] . "\n";
            echo "IMU Value: " . (is_array($imu['value']) ? implode(', ', $imu['value']) : $imu['value']) . "\n";
            echo "IMU Unit: " . $imu['unit'] . "\n";
            echo "---\n";
        }
    }

    // Check for 'joystick' key and print joystick data
    if (isset($item['name']) && $item['name'] == 'joystick') {
        echo "Joystick Direction: " . $item['direction'] . "\n";
        echo "Joystick Action: " . $item['action'] . "\n";
        echo "---\n";
    }

    // Check for 'LEDs' key and print LED data
    if (isset($item['LEDs'])) {
        foreach ($item['LEDs'] as $led) {
            foreach ($led as $led_name => $led_value) {
                echo "$led_name: [" . implode(', ', $led_value) . "]\n";
            }
        }
        echo "---\n";
    }
}




?>
