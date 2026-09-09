<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>طلب جديد - Gosor Solutions</title>
    <style>
        body, table, td, a { -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; }
        table, td { mso-table-lspace: 0pt; mso-table-rspace: 0pt; }
        img { -ms-interpolation-mode: bicubic; border: 0; outline: none; text-decoration: none; }
        body {
            margin: 0;
            padding: 0;
            background-color: #06080e;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            color: #e2e8f0;
            direction: rtl;
            text-align: right;
        }
        .wrapper {
            width: 100%;
            table-layout: fixed;
            background-color: #06080e;
            padding: 30px 0 40px 0;
        }
        .main-container {
            max-width: 620px;
            margin: 0 auto;
            background-color: #0c101d;
            border: 1px solid #18223c;
            border-radius: 16px;
            overflow: hidden;
        }
        .header {
            padding: 35px 30px 25px 30px;
            text-align: center;
            background-color: #0c101d;
            border-bottom: 1px solid #18223c;
        }
        .badge {
            display: inline-block;
            padding: 6px 16px;
            background-color: #283891;
            color: #ffffff;
            font-size: 13px;
            font-weight: 700;
            border-radius: 9999px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 12px;
        }
        .title {
            color: #ffffff;
            font-size: 22px;
            font-weight: 800;
            margin: 0 0 6px 0;
        }
        .subtitle {
            color: #94a3b8;
            font-size: 14px;
            margin: 0;
        }
        .content {
            padding: 30px;
        }
        .project-highlight {
            background-color: #06080e;
            border: 1px solid #18223c;
            border-radius: 14px;
            padding: 20px;
            margin-bottom: 24px;
            text-align: center;
        }
        .project-highlight .label {
            font-size: 12px;
            color: #7d93ff;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 6px;
        }
        .project-highlight .value {
            font-size: 19px;
            font-weight: 800;
            color: #ffffff;
            margin: 0;
        }
        .info-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 10px;
            margin-bottom: 24px;
        }
        .info-row {
            background-color: #06080e;
            border-radius: 10px;
        }
        .info-label {
            padding: 12px 16px;
            color: #94a3b8;
            font-size: 14px;
            font-weight: 600;
            width: 32%;
            border-top-right-radius: 10px;
            border-bottom-right-radius: 10px;
            border: 1px solid #18223c;
            border-left: none;
        }
        .info-value {
            padding: 12px 16px;
            color: #ffffff;
            font-size: 14px;
            font-weight: 600;
            border-top-left-radius: 10px;
            border-bottom-left-radius: 10px;
            border: 1px solid #18223c;
            border-right: none;
        }
        .info-value a {
            color: #7d93ff;
            text-decoration: none;
        }
        .message-box {
            background-color: #06080e;
            border: 1px solid #18223c;
            border-radius: 14px;
            padding: 20px;
            margin-bottom: 25px;
        }
        .message-box .title-row {
            font-size: 13px;
            color: #94a3b8;
            font-weight: 700;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .message-box .text-content {
            font-size: 14px;
            line-height: 1.7;
            color: #f1f5f9;
            white-space: pre-line;
            margin: 0;
        }
        .actions-container {
            text-align: center;
            padding: 10px 0 20px 0;
        }
        .btn-admin {
            display: inline-block;
            background-color: #283891;
            color: #ffffff !important;
            text-decoration: none;
            padding: 12px 24px;
            border-radius: 10px;
            font-weight: 700;
            font-size: 14px;
            margin: 5px;
        }
        .btn-reply {
            display: inline-block;
            background-color: #283891;
            color: #ffffff !important;
            text-decoration: none;
            padding: 12px 24px;
            border-radius: 10px;
            font-weight: 700;
            font-size: 14px;
            margin: 5px;
        }
        .footer {
            padding: 24px 30px;
            text-align: center;
            background-color: #06080e;
            border-top: 1px solid #18223c;
        }
        .footer-text {
            color: #64748b;
            font-size: 12px;
            margin: 0 0 6px 0;
        }
        .footer-logo {
            font-size: 14px;
            font-weight: 800;
            color: #94a3b8;
            letter-spacing: 0.5px;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="main-container">
            <!-- Header -->
            <div class="header">
                <div class="badge">طلب جديد / New Request</div>
                <h1 class="title">إشعار استلام طلب من الموقع</h1>
                <p class="subtitle">{{ $source ?? 'نموذج التواصل بموقع جسور' }} &bull; {{ now()->format('Y-m-d H:i') }}</p>
            </div>

            <!-- Content -->
            <div class="content">
                <!-- Highlight Project Type -->
                <div class="project-highlight">
                    <div class="label">نوع المشروع المطلوب (Project Type)</div>
                    <div class="value">{{ $contact->project_type ?: 'طلب عام / استفسار' }}</div>
                </div>

                <!-- Info Table -->
                <table class="info-table" width="100%">
                    <tr class="info-row">
                        <td class="info-label">اسم العميل (Name):</td>
                        <td class="info-value">{{ $contact->name }}</td>
                    </tr>
                    <tr class="info-row">
                        <td class="info-label">البريد الإلكتروني (Email):</td>
                        <td class="info-value">
                            <a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a>
                        </td>
                    </tr>
                    @if(!empty($contact->phone))
                    <tr class="info-row">
                        <td class="info-label">رقم الهاتف (Phone):</td>
                        <td class="info-value" dir="ltr" style="text-align: right;">
                            <a href="tel:{{ $contact->phone }}">{{ $contact->phone }}</a>
                        </td>
                    </tr>
                    @endif
                    @if(!empty($contact->company))
                    <tr class="info-row">
                        <td class="info-label">اسم الشركة (Company):</td>
                        <td class="info-value">{{ $contact->company }}</td>
                    </tr>
                    @endif
                    <tr class="info-row">
                        <td class="info-label">مصدر النموذج (Source):</td>
                        <td class="info-value">{{ $source ?? 'Website Landing Page' }}</td>
                    </tr>
                </table>

                <!-- Message Box -->
                <div class="message-box">
                    <div class="title-row">
                        <span> تفاصيل الطلب والرسالة (Request Details):</span>
                    </div>
                    <div class="text-content">{{ $contact->message ?: 'لا توجد ملاحظات إضافية.' }}</div>
                </div>

                <!-- Action Buttons -->
                <div class="actions-container">
                    @php
                        $adminUrl = !empty($contact->id) 
                            ? url('/admin/contact-messages/' . $contact->id) 
                            : url('/admin/contact-messages');
                    @endphp
                    <a href="{{ $adminUrl }}" target="_blank" class="btn-admin">
                         عرض الطلب في لوحة التحكم (Admin Panel)
                    </a>
                </div>
            </div>

            <!-- Footer -->
            <div class="footer">
                <p class="footer-text">تم إرسال هذا الإشعار تلقائياً إلى <strong style="color: #94a3b8;">mahfouzm25@gmail.com</strong> فور تعبئة النموذج من الموقع الرسمي.</p>
                <div class="footer-logo">GOSOR SOLUTIONS &copy; {{ date('Y') }}</div>
            </div>
        </div>
    </div>
</body>
</html>
