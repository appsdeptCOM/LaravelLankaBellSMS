# Laravel LankaBell SMS Library by AppsDept

## Introduction
AppsDept LankaBell SMS Library provides a simple interface to send SMSs

## License
Laravel LankaBell SMS Library is open-sourced software licensed under the [MIT license](LICENSE.md).

## Installation

### Publish the Provider
php artisan vendor:publish --provider="AppsDept\LaravelLankaBellSMS\LankaBellServiceProvider"

### Migrate
php artisan migrate

## Usage

### Environment Setup

Generate your LB_Key from your dashboard.

Add the following inside your .env

LB_SECURE_KEY="LB_Key750 YouKeyGoesHere="

LB_API_PORT=4090


### 2Factor Auth
This will Text a Random code and returns the generated code.

$code = LankaBellSMS::TwoFactorAuth('071XXXXXXX');

return $code;

### Send a SMS to a Number
LankaBellSMS::SendText('071XXXXXXX', 'Message that need to be sent');

The Send messages will be stored in the databases.


## Contact Us
www.appsdept.com
