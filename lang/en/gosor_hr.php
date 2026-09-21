<?php

return [
    'meta' => [
        'title' => 'Gosor HR - Comprehensive HRMS, Smart Attendance & Payroll Platform',
        'description' => 'Unified Cloud HR management system: GPS attendance, automated payroll, employee self-service mobile app, and recruitment module.',
    ],
    'nav' => [
        'home' => 'Home',
        'attendance' => 'Smart Attendance',
        'mobile_app' => 'Mobile App',
        'reports' => 'Payroll & Finances',
        'recruitment' => 'Recruitment',
        'pricing' => 'Pricing',
        'faq' => 'FAQ',
        'request_demo' => 'Request Demo',
        'back_to_gosor' => 'Gosor Solutions',
    ],
    'hero' => [
        'badge' => '⚡ Comprehensive Cloud HRMS & Payroll Platform',
        'title_prefix' => 'Manage Workforce, Attendance & Payroll with',
        'title_highlight' => 'Gosor HR',
        'title_suffix' => '',
        'subtitle' => 'An integrated cloud platform that connects mobile GPS attendance, leave & loan requests, automated payroll calculation, and recruitment in one unified ecosystem.',
        'cta_primary' => 'Schedule a Live Demo',
        'cta_secondary' => 'Explore Core Modules',
        'trust_badge' => 'Trusted by forward-thinking companies to manage branches and field teams',
        'stats' => [
            'accuracy' => [
                'value' => '100%',
                'label' => 'Attendance Accuracy',
                'sub' => 'High-precision GPS perimeter validation',
            ],
            'savings' => [
                'value' => '80%',
                'label' => 'Time Saved in Payroll',
                'sub' => 'Automated calculation with loans & allowances',
            ],
            'hardware' => [
                'value' => '100%',
                'label' => 'Employee Self-Service',
                'sub' => 'Loans, leaves & payslips on mobile',
            ],
            'uptime' => [
                'value' => '24/7',
                'label' => 'Cloud Availability & Sync',
                'sub' => 'Real-time sync and instant manager approvals',
            ],
        ],
    ],
    'attendance' => [
        'badge' => 'Smart Attendance System',
        'title' => 'Flexible Attendance Management for Every Work Environment',
        'subtitle' => 'Integrated solution supporting on-site, remote, and field employees with real-time manager approval workflows.',
        'features' => [
            'gps' => [
                'title' => 'GPS Geofencing Perimeters',
                'desc' => 'Define precise virtual geographic boundaries around your branches or job sites. Employees can only clock in when physically inside the designated zone.',
            ],
            'remote' => [
                'title' => 'Remote Work & Manager Approvals',
                'desc' => 'Employees can request and clock in from home or off-site with instant push notifications for managers to review and approve remote attendance on the fly.',
            ],
            'field' => [
                'title' => 'Live Field & Route Tracking',
                'desc' => 'Real-time location monitoring and visit verification for sales representatives, delivery personnel, and roving field teams with interactive maps.',
            ],
            'shifts' => [
                'title' => 'Flexible Shifts & Grace Periods',
                'desc' => 'Support for multiple shifts, rotating schedules, grace periods, off-days, and public holidays configured per branch or department.',
            ],
            'offline' => [
                'title' => 'Offline Mode with Auto-Sync',
                'desc' => 'Works seamlessly during internet outages or in remote areas. Attendance logs are securely saved locally and synchronized once reconnected.',
            ],
            'security' => [
                'title' => 'Anti-Spoofing & Security Protection',
                'desc' => 'Advanced security blocks Fake GPS apps, emulators, and VPNs, with optional photo verification to eliminate buddy punching completely.',
            ],
        ],
    ],
    'app' => [
        'badge' => 'Employee Self-Service (ESS)',
        'title' => 'A Complete Mobile App for Every Employee (iOS & Android)',
        'subtitle' => 'Empower your team with end-to-end self-service: smart clock-in, loan & leave requests, monthly payslip access, and daily task management.',
        'features' => [
            'clock' => '1-tap GPS clock-in/out with location perimeter validation',
            'remote' => 'Request & log remote work attendance with instant manager alert',
            'leaves' => 'Submit leave requests with attachments & track remaining balances',
            'loans' => 'Apply for salary advances/loans & monitor repayment installment schedules',
            'payslips' => 'Instant access to digital payslips (PDF) and salary breakdowns',
            'history' => 'Interactive monthly attendance calendar showing hours, delays & overtime',
            'tasks' => 'View daily task assignments, update progress & manage personal To-Do list',
            'notifications' => 'Real-time push notifications for approvals, reminders & announcements',
        ],
    ],
    'reports' => [
        'badge' => 'Payroll & Financial Engine',
        'title' => 'Comprehensive Reports & Automated Payroll Calculations',
        'subtitle' => 'Automatically connects hours worked, overtime, allowances, loan installments, and deductions into finalized payroll sheets.',
        'tabs' => [
            'payroll' => 'Automated Payroll Sheet',
            'attendance' => 'Monthly Attendance Log',
            'financial' => 'Salary Breakdown & Loans',
        ],
        'payroll_card' => [
            'title' => '1-Click Payroll Calculation Engine',
            'desc' => 'System formula: Net Salary = (Base + Allowances + Overtime + Bonuses) - (Penalties + Absences + Loans + Taxes).',
            'items' => [
                'Configurable allowance formulas, ad-hoc bonuses, and automated loan installment deductions',
                'Direct bank transfer WPS file exports with localized compliance',
                'Point-in-time monthly snapshot locks (Monthly Snapshots) preventing retroactive alterations',
            ],
        ],
        'radar_card' => [
            'title' => 'Daily Attendance & Log History',
            'desc' => 'Detailed timeline of every clock-in, clock-out, delay minutes, overtime hours, and attendance mode (Office / Remote / Field).',
            'items' => [
                'Precise arrival & departure timestamps with GPS geofencing & remote approval status',
                'Automatic delay calculation against assigned shift schedule and grace periods',
                'Color-coded status indicators (Present, Late, Off-day, Leave, Remote)',
            ],
        ],
        'financial_card' => [
            'title' => 'Itemized Payslips & Financial Breakdown',
            'desc' => 'Itemized breakdown of basic salary, allowances, overtime, loan deductions, and net payable amount with downloadable PDF pay slips.',
            'items' => [
                'Transparent deduction formulas (delay rate multipliers & unauthorized absence penalties)',
                'Automated loan and salary advance schedules with recurring monthly deductions',
                'Digital Payslips (PDF) accessible directly by employees through their mobile app',
            ],
        ],
    ],
    'recruitment' => [
        'badge' => 'Recruitment & Applicant Tracking (ATS)',
        'title' => 'End-to-End Hiring Pipeline from Job Post to Onboarding',
        'subtitle' => 'Publish openings, track candidates via interactive Kanban and application tables, preview CVs instantly in-app, and convert hired candidates into employees in 1 click.',
        'tabs' => [
            'kanban' => 'Applicants Kanban Board',
            'applications' => 'Applications Table',
            'portal' => 'Careers Portal & Job Details',
            'cv_preview' => 'CV Previewer (PDF Viewer)',
        ],
        'kanban_card' => [
            'title' => 'Interactive Kanban Pipeline',
            'desc' => 'Visual drag-and-drop workflow tracking across all stages: Under Review, Shortlisted, Interview Stage, Offer Extended, Hired, or Rejected.',
            'items' => [
                'Drag and drop applicants seamlessly across 6 standardized recruitment stages',
                'Quick action dropdown to preview PDF CV, view candidate profile, or update status',
                'One-click toggle between interactive Kanban view and structured Table view',
            ],
        ],
        'applications_card' => [
            'title' => 'Centralized Applications Table & Filtering',
            'desc' => 'Comprehensive candidate registry with fast keyword search by name, email, phone number, job title, and application status.',
            'items' => [
                'Real-time filtering by job vacancy and applicant stage',
                'Instant access icons to preview or download candidate PDF CVs',
                '"Hired" badge indication with direct onboarding into the HR system',
            ],
        ],
        'portal_card' => [
            'title' => 'Public Careers Portal & Job Details',
            'desc' => 'Branded public job pages presenting responsibilities, qualifications, summary badges, and seamless direct application forms.',
            'items' => [
                'Detailed breakdown of salary range, work type (Office/Hybrid/Remote), and location',
                'Direct online application form with PDF resume upload',
                'Instant social sharing via WhatsApp, LinkedIn, and copy link',
            ],
        ],
        'cv_card' => [
            'title' => 'In-App Instant PDF CV Viewer',
            'desc' => 'Review applicant resumes and portfolios directly within the browser without downloading and saving files to your local drive.',
            'items' => [
                'Full-featured PDF viewer with zoom controls, page navigation, printing, and download',
                'Evaluate candidates and record notes directly while reviewing resumes',
                '1-Click "Convert to Employee" to auto-create user profile and attach original CV',
            ],
        ],
        'features' => [
            'portal' => [
                'title' => 'Public Careers Portal & Direct Application',
                'desc' => 'Comprehensive job detail pages with responsibilities, qualifications, compensation details, and online application form with social sharing.',
            ],
            'kanban' => [
                'title' => 'Interactive Kanban Pipeline',
                'desc' => 'Visual drag-and-drop workflow tracking: Under Review → Shortlisted → Interview Stage → Offer Extended → Hired → Rejected.',
            ],
            'applications' => [
                'title' => 'Applications Table & Fast Screening',
                'desc' => 'Real-time keyword search and filtering across all applicants with 1-click CV viewing and hired employee onboarding.',
            ],
            'cv_viewer' => [
                'title' => 'In-App Instant PDF CV Viewer',
                'desc' => 'Review and examine applicant resumes directly within the browser without downloading files, with 1-click hire conversion.',
            ],
        ],
    ],
    'pricing' => [
        'badge' => 'Simple, Transparent Pricing',
        'title' => 'One Powerful Plan That Scales With Your Business',
        'subtitle' => 'Pay only for what you use per employee. Zero hidden fees, with full flexibility to upgrade anytime.',
        'billing' => [
            'monthly' => 'Monthly Billing',
            'yearly' => 'Yearly Billing',
            'save_badge' => 'Save up to 25%',
        ],
        'plan' => [
            'name' => 'All-in-One Enterprise Plan',
            'badge' => 'Includes All Core Modules & Mobile App',
            'desc' => 'Everything your organization needs: GPS attendance, shifts, automated payroll, loans, leaves, recruitment module, and employee self-service mobile app.',
            'monthly_price' => '200',
            'yearly_price' => '150',
            'currency' => 'EGP',
            'period_month' => '/ employee / month',
            'period_year' => '/ employee / month',
            'billed_annually_note' => 'Billed annually (Save 25%)',
            'billed_monthly_note' => 'Flexible monthly billing',
            'cta' => 'Start 7-Day Free Trial',
            'trial_badge' => '⚡ 7-Day Full-Access Free Trial • No Credit Card Required',
            'feature_groups' => [
                'attendance' => [
                    'title' => 'Smart Attendance & GPS Geofencing',
                    'icon' => 'map-pin',
                    'items' => [
                        'GPS geofence clock-in/out directly from employee mobile devices',
                        'Remote work attendance with instant manager approval workflow',
                        'Live map tracking for sales reps, remote and field teams',
                        'Military-grade anti-spoofing protection (blocks Fake GPS & VPNs) + Offline mode',
                    ],
                ],
                'payroll' => [
                    'title' => 'Automated Payroll, Loans & Leaves',
                    'icon' => 'calculator',
                    'items' => [
                        'Minute-accurate automated calculations for late minutes, overtime & net salary',
                        'Automated loan & advance request approvals with monthly installment deductions',
                        '1-click salary sheet & bank transfer export (WPS compliant) with monthly snapshots',
                        'Comprehensive leave management, balance tracking, and entitlement accruals',
                    ],
                ],
                'mobile_ai' => [
                    'title' => 'Employee Self-Service (ESS)',
                    'icon' => 'sparkles',
                    'items' => [
                        'Native iOS & Android app for all employees with instant push alerts',
                        'Digital monthly payslips, loan status, attendance calendar & leave balance',
                        'Personal task lists (To-Do) and daily work tracking',
                        'Permission requests, notifications & administrative announcements',
                    ],
                ],
                'recruitment' => [
                    'title' => 'Recruitment Module & Careers Portal',
                    'icon' => 'briefcase',
                    'items' => [
                        'Branded public careers portal for publishing job openings and receiving CVs',
                        'Interactive Kanban board to track applicants across hiring stages',
                        '1-click "Convert to Employee" to auto-create user, profile, and contract records',
                        'Granular role-based permissions (RBAC) and complete activity audit trail',
                    ],
                ],
            ],
            'calculator' => [
                'title' => 'Estimated Cost Calculator',
                'slider_label' => 'Your team size:',
                'unit' => 'employees',
                'monthly_total' => 'Total Monthly Cost:',
                'yearly_total' => 'Total Annual Cost:',
                'yearly_savings' => 'Annual Savings:',
                'billed_annually' => 'with annual billing',
                'billed_monthly' => 'with monthly billing',
            ],
        ],
        'custom' => [
            'title' => 'Enterprise with 100+ employees or custom integrations?',
            'desc' => 'We offer tailored volume enterprise contracts, custom ERP integrations (SAP, Oracle, Odoo), dedicated SLA, and hybrid deployment options.',
            'cta' => 'Contact Enterprise Sales',
        ],
    ],
    'faq' => [
        'badge' => 'Got Questions?',
        'title' => 'Frequently Asked Questions',
        'subtitle' => 'Everything you need to know about implementing Gosor HR across your organization.',
        'items' => [
            [
                'q' => 'How does GPS attendance work in Gosor HR?',
                'a' => 'Employees clock in through the mobile app. The system automatically validates their GPS coordinates to ensure they are physically present inside the designated branch or work site.',
            ],
            [
                'q' => 'How does the system handle Remote Work check-ins?',
                'a' => 'Employees can clock in remotely when working from home. An instant notification is dispatched to their reporting manager with the timestamp and location, allowing 1-click approval or rejection.',
            ],
            [
                'q' => 'Can employees request loans and leaves from their mobile app?',
                'a' => 'Yes. Employees can submit leave requests with remaining balance lookup, and apply for salary advances or installment loans. Once approved by HR/Finance, repayments are automatically scheduled and deducted from future payroll.',
            ],
            [
                'q' => 'Can employees view their detailed salary slips (Payslips)?',
                'a' => 'Yes. The mobile app provides a transparent itemized view of base pay, allowances, overtime bonuses, and loan/late deductions, with a 1-tap downloadable PDF payslip.',
            ],
            [
                'q' => 'What features does the Recruitment Module provide?',
                'a' => 'The platform includes a public careers portal for your vacancies, an interactive Kanban board for candidate progression, and a 1-click feature to convert hired applicants directly into full employee profiles.',
            ],
            [
                'q' => 'Can employees cheat or fake their GPS location?',
                'a' => 'No. Gosor HR includes advanced anti-mock location algorithms that detect and block GPS spoofing apps, emulator environments, VPN tampering, and photo-screen trickery.',
            ],
        ],
    ],
    'demo' => [
        'badge' => 'Get Started Today',
        'title' => 'Ready to Upgrade Your HR & Attendance?',
        'subtitle' => 'Book a personalized walkthrough with our HR tech specialists and see Gosor HR in action for your organization.',
        'form' => [
            'name' => 'Full Name',
            'name_placeholder' => 'e.g. John Doe',
            'email' => 'Work Email Address',
            'email_placeholder' => 'john@company.com',
            'phone' => 'Phone / WhatsApp Number',
            'phone_placeholder' => '+20 100 000 0000',
            'company' => 'Company Name',
            'company_placeholder' => 'e.g. Acme Corporation',
            'employees_count' => 'Number of Employees',
            'employees_count_placeholder' => 'Enter number of employees (e.g. 20)',
            'billing_cycle' => 'Preferred Billing Cycle',
            'billing_yearly' => 'Annual Billing (150 EGP / emp • Save 25%)',
            'billing_monthly' => 'Monthly Billing (200 EGP / emp)',
            'estimated_price_label' => 'Calculated Estimated Cost:',
            'yearly_savings_prefix' => 'Save',
            'billed_annually_text' => 'billed annually',
            'billed_monthly_text' => 'billed monthly',
            'message' => 'Specific Requirements / Note',
            'message_placeholder' => 'Tell us about your branches, current attendance system, or specific needs...',
            'submit' => 'Request Free Live Demo',
            'sending' => 'Submitting Request...',
            'privacy_notice' => 'We respect your privacy. No spam, ever.',
        ],
        'benefits' => [
            'free_trial' => '7-day risk-free pilot for your team',
            'free_onboarding' => 'Free setup & employee data migration assistance',
            'dedicated_support' => 'Dedicated account manager & 24/7 technical support',
        ],
    ],
    'footer' => [
        'tagline' => 'Smart Cloud HR Management, Next-Gen Attendance & Integrated Payroll Platform.',
        'copyright' => '© :year Gosor Solutions. All rights reserved.',
        'solutions' => 'Solutions',
        'company' => 'Company',
        'quick_links' => 'Quick Links',
    ],
];
