# E-Authentication System using QR Code and OTP           
   
This project provides an E-Authentication system that allows users to log in using two-factor authentication methods: QR code scanning or OTP (One-Time Password) verification. Users register by providing basic details such as name, mobile number, email, and gender. After successful registration, the user can choose between logging in via QR code or OTP.

## Features

- **Dual Authentication Methods**: Users can log in using either QR code scanning or OTP verification.
  
- **User Registration**: Users register by providing their basic details which are stored securely in the database.

- **QR Code Login**: If the user chooses the QR code login option, a unique QR code is generated using the user's mobile number and sent to the registered mobile number. The system activates the webcam for QR code verification using Instascan. Upon successful verification of the mobile number from the QR code with the registered mobile number in the database, the user gains access to the system.

- **OTP Login**: If the user chooses the OTP login option, a random OTP is generated by the system using the Fast2SMS API and sent to the registered mobile number. The user needs to enter the OTP correctly to gain access to the system.

## Technologies Used

- **Frontend**: HTML, CSS, JavaScript
- **Backend**: PHP for database operations
- **QR Code Verification**: Instascan
- **OTP Messaging**: Fast2SMS API
- **QR Code to SMS**: Sinch.com API

## Getting Started

### Prerequisites

- Web server with PHP support
- Webcam for QR code scanning
- Mobile phone for OTP verification
- Fast2SMS API key
- Sinch.com API key

