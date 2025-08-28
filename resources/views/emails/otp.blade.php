<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Sanatan OTP</title>
</head>
<body style="margin:0; padding:0; background:#f4f4f4; font-family: Arial, sans-serif;">

    <table align="center" width="100%" cellpadding="0" cellspacing="0" style="max-width:600px; background:#ffffff; margin:30px auto; border-radius:10px; box-shadow:0 2px 8px rgba(0,0,0,0.1);">
        <tr>
            <td style="background:#2c3e50; padding:20px; text-align:center; border-top-left-radius:10px; border-top-right-radius:10px;">
                <h2 style="color:#ffffff; margin:0;">Sanatan</h2>
            </td>
        </tr>

        <tr>
            <td style="padding:30px; text-align:left; color:#333333;">
                <h3 style="margin-top:0; color:#2c3e50;">Welcome to Sanatan</h3>
                <p style="font-size:16px; line-height:1.5;">
                    Thank you for registering with us. Please use the OTP below to verify your email address:
                </p>

                <p style="font-size:22px; font-weight:bold; text-align:center; margin:30px 0; color:#e74c3c;">
                    {{ $otp }}
                </p>

                <p style="font-size:14px; color:#555;">
                    This OTP is valid for the next <strong>10 minutes</strong>. Please do not share it with anyone for security reasons.
                </p>
            </td>
        </tr>

        <tr>
            <td style="background:#f4f4f4; padding:15px; text-align:center; border-bottom-left-radius:10px; border-bottom-right-radius:10px; font-size:12px; color:#777;">
                © {{ date('Y') }} Sanatan. All rights reserved.
            </td>
        </tr>
    </table>

</body>
</html>
