<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TranslateSeeder extends Seeder
{
    public function __construct()
    {
        $this->groups = [
            'website' => $this->website_items,
            'member' => $this->member_items,
            'admin' => $this->admin_items,
        ];
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->groups as $list => $group) {
            foreach ($group as $key => $item) {
                DB::table('ltm_translations')->updateOrInsert(
                    [
                        'locale' => $this->locale,
                        'group' => $list,
                        'key' => $key,
                        'value' => $item,
                    ],
                    [
                        'key' => $key,
                        'value' => $item,
                        'locale' => $this->locale,
                        'group' => $list,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]
                );
            }
        }
    }


    private $locale = "en";

    private $admin_items = [
        'title' => 'title',
        'text' => 'text',
        'pleasetitle' => 'Please Enter title...',
        'content' => 'Content',
        'pleasecontent' => 'Please Enter Content...',
        'ckeditor' => 'ckeditor',
        'picture' => 'Picture',
        'author' => 'author',
        'author_id' => 'author_id',
        'pleaseauthor' => 'Please Enter Author...',
        'status' => 'status',
        'pleasestatus' => 'Please Select Status...',
        'active' => 'active',
        'deactive' => 'deactive',
        'maininformation' => 'Main Information',
        'saveinformation' => 'Save Information',
        'save' => 'Save',
        'dashboard' => 'Dashboard',
        'addblog' => 'Add blog',
        'name' => 'Name',
        'pleasename' => 'Please Enter Name...',
        'region' => 'region',
        'pleaseregion' => 'Please Enter Region...',
        'addbranch' => 'Add Branch',
        'editbranch' => 'Edit Branch',
        'pdf' => 'pdf',
        'isolatedlink' => 'Isolated link',
        'filter' => 'Isolated link',
        'importfromfile' => 'Import from file',
        'action' => 'Action',
        'anotheraction' => 'Another action',
        'anotheroption' => 'Another option',
        'modaltitles' => 'Modal titles',
        'search' => 'search',
        'pleaseenterText' => 'Please Enter Your Text...',
        'field' => 'field',
        'kind' => 'kind',
        'ordering' => 'Ordering',
        'totalusers' => 'Total users',
        'progress' => 'progress',
        'success' => 'success',
        'new_projects' => 'new Projects',
        'new_invoices' => 'new Invoices',
        'all_projects' => 'all Projects',
        'changing' => 'Changing',
        'paneltitle' => 'panel title',
        'contacttitle' => 'contact title',
        'contacttableheader' => 'contact table header',
        'backcontact' => 'Back To Contact',
        'addcountry' => 'Add Country',
        'blogtitle' => 'blog title',
        'blogtableheader' => 'blog table header',
        'branchtitle' => 'branch title',
        'branchtableheader' => 'branch table header',
        'flag' => 'flag',
        'currency' => 'Currency',
        'pleaseentercurrency' => 'Please Enter Currency...',
        'countrytitle' => 'country title',
        'countrytableheader' => 'country table header',
        'editpage' => 'Edit Page',
        'faqtitle' => 'faq title',
        'faqtableheader' => 'faq table header',
        'addfaq' => 'Add faq',
        'orderitemstitle' => 'order items title',
        'orderitemstableheader' => 'order items table header',
        'id' => 'id',
        'pleaseenterid' => 'Please Enter Id...',
        'userid' => 'user id',
        'show' => 'show',
        'country' => 'country',
        'shop' => 'Shop',
        'producttype' => 'Product Type',
        'quantity' => 'Quantity',
        'price' => 'Price',
        'ordertrack' => 'Order Track',
        'orderdate' => 'Order Date',
        'orderfile' => 'Order File',
        'download' => 'Download',
        'clicktodownload' => 'Please Click To Download File',
        'description' => 'Description',
        'ordered' => 'ORDERED',
        'warehouseabroad' => 'WAREHOUSE ABROAD',
        'onway' => 'ON WAY',
        'customsinspection' => 'CUSTOMS INSPECTION',
        'inwarehouse' => 'IN WAREHOUSE',
        'courierdeliery' => 'COURIER DELIVERY',
        'return' => 'RETURN',
        'complete' => 'COMPLETE',
        'backtoinvoices' => 'Back To Invoices',
        'back' => 'back',
        'showinvoice' => 'Show Invoice',
        'togglenavigation' => 'Toggle Navigation',
        'admin' => 'Admin',
        'login' => 'Login',
        'register' => 'Register',
        'logout' => 'Logout',
        'copyright' => 'Copyright © 2020',
        'messages' => 'Messages',
        'viewall' => 'View all',
        'Seeallmessages' => 'See All Messages',
        'notifications' => 'Notifications',
        'viewallnotifications' => 'View All Notifications',
        'profile' => 'Profile',
        'settings' => 'Settings',
        'signout' => 'Sign Out',
        'main' => 'Main',
        'regionandcountry' => 'region & country',
        'countries' => 'countries',
        'regions' => 'regions',
        'pages' => 'pages',
        'createpage' => 'create page',
        'blogs' => 'blogs',
        'articles' => 'Articles',
        'createarticle' => 'create article',
        'contactus' => 'contact-us',
        'faqs' => 'faqs',
        'createfaq' => 'create faq',
        'payments' => 'Payments',
        'branches' => 'Branches',
        'branch' => 'Branch',
        'orders' => 'Orders',
        'showorders' => 'Show Orders',
        'showorderitems' => 'Show Order Items',
        'invoices' => 'Invoices',
        'showinvoices' => 'Show Invoices',
        'translate' => 'Translate',
        'translateplugin' => 'Translate Plugin',
        'setting' => 'Setting',
        'showsetting' => 'Show Setting',
        'viewdemo' => 'View Demo',
        'buynow' => 'Buy Now',
        'ourportfolio' => 'Our Portfolio',
        'navigationstyle' => 'Navigation Style',
        'horizontal' => 'Horizontal',
        'leftmenu' => 'Left-menu',
        'skinmodes' => 'Skin Modes',
        'defaultmode' => 'Default  Mode',
        'darkmode' => 'Dark Mode',
        'colorskins' => 'Color Skins',
        'headerstylesmode' => 'Header Styles Mode',
        'lightmenu' => 'Light Menu',
        'darkmenu' => 'Dark Menu',
        'colormenu' => 'Color Menu',
        'graidentmenu' => 'Graident Menu',
        'leftmenustylesmode' => 'Leftmenu Styles Mode',
        'gradientcolormenu' => 'Gradient-Color Menu',
        'link' => 'Gradient-Color Menu',
        'hascargo' => 'Has Cargo',
        'total' => 'total',
        'backtoorderitems' => 'Back To Order Items',
        'ordertitle' => 'order title',
        'ordertableheader' => 'order table header',
        'totalprice' => 'Total Price',
        'paymenttype' => 'Payment Type',
        'backtoorders' => 'Back To Orders',
        'addpage' => 'Add Page',
        'pagetitle' => 'page title',
        'pagetitletableheader' => 'page table header',
        'paymenttableheader' => 'payment table header',
        'discount' => 'discount',
        'authority' => 'authority',
        'refid' => 'refid',
        'extra' => 'extra',
        'backtopayments' => 'Back To Payments',
        'pleaseenterdescription' => 'Please Enter Description...',
        'pleaseentercountry' => 'Please Enter Country...',
        'addregion' => 'Add Region',
        'regiontitle' => 'region title',
        'regiontableheader' => 'region table header',
        'key' => 'Key',
        'value' => 'Value',
        'pleaseentervalue' => 'Please Enter Value...',
        'editregion' => 'Edit Region',
        'settingtitle' => 'setting title',
        'pleaseenterfamily' => 'Please Enter Family...',
        'family' => 'Family',
        'pleaseenteremail' => 'Please Enter Email...',
        'gender' => 'gender',
        'pleaseentergender' => 'Please Enter Gender...',
        'male' => 'Male',
        'female' => 'Female',
        'phone' => 'Phone',
        'pleaseenterphone' => 'Please Enter Phone...',
        'address' => 'Address',
        'pleaseenteraddress' => 'Please Enter Address...',
        'fin' => 'Fin',
        'pleaseenterfin' => 'Please Enter Fin...',
        'citizenship' => 'Citizenship',
        'pleaseentercitizenship' => 'Please Enter Citizenship...',
        'serialnumber' => 'Serial Number',
        'pleaseenterserialnumber' => 'Please Enter Serial Number...',
        'birthday' => 'BirthDay',
        'password' => 'Password',
        'pleasepnterpassword' => 'Please Enter Password',
        'passwordconfirm' => 'Password Confirm',
        'enterpasswordconfirmation' => 'Please Enter Password Confirmation',
        'pleaseenterstatus' => 'Please Enter Status...',
        'adduser' => 'Add User',
        'email' => 'email',
        'edituser' => 'Edit User',
        'usertitle' => 'Edit User',
        'usertableheader' => 'user table header',
        'birthdate' => 'Birthdate',
        'backtousers' => 'Back To Users',
        'users' => 'User',
        'showuser' => 'Show User',
        'calculator' => 'calculator',
        'showcalculator' => 'Showcalculator',
        'answer' => 'Answer',
        'send' => 'Send',
        'date' => 'date'
    ];

    private $member_items = [
        'login' => 'Login',
        'invoice_title' => 'invoice',
        'order_title' => 'order',
        'email' => 'Email',
        'password' => 'Password',
        'rememberme' => 'remember me',
        'name' => 'Name',
        'family' => 'Family',
        'passwordconfirmation' => 'Password Confirmation',
        'serialnumber' => 'Serial Number',
        'citizenship' => 'Citizenship',
        'phone' => 'phone',
        'birthday' => 'birthday',
        'address' => 'address',
        'gender' => 'gender',
        'male' => 'male',
        'female' => 'female',
        'Agreepolicy' => 'Agree the Terms and policy',
        'register' => 'Register',
        'all' => 'All',
        'ordered' => 'Ordered',
        'anbar' => 'anbar',
        'Heisway' => 'He is on his way',
        'Customsinspection' => 'Customs inspection',
        'warehouse' => 'warehouse',
        'courierdelivery' => 'Courier delivery',
        'return' => 'Return',
        'complete' => 'Complete',
        'order№' => 'Order №',
        'orderdate' => 'Order date',
        'shop' => 'Shop',
        'status' => 'Status',
        'action' => 'Action',
        'dashboard' => 'Dashboard',
        'myaddressesabroad' => 'My addresses abroad',
        'orders' => 'Orders',
        'mybindings' => 'My bindings',
        'aznBalance' => 'AZN Balance',
        'tlBalance' => 'TL Balance',
        'courier' => 'Courier',
        'inquiry' => 'Inquiry',
        'setting' => 'Setting',
        'logout' => 'Log Out',
        'customercode' => 'customer code',
        'invoice' => 'invoice',
        'order' => 'order',
        'filter' => 'Filter',
        'warehoseabroad' => 'WAREHOUSE ABROAD',
        'onway' => 'ON WAY',
        'custominspection' => 'CUSTOMS INSPECTION',
        'inwarehose' => 'IN WAREHOUSE',
        'orderid' => 'Order id',
        'link' => 'link',
        'price' => 'price',
        'hascargo' => 'has cargo',
        'cargo' => 'cargo',
        'quantity' => 'quantity',
        'description' => 'description',
        'specification' => 'specification',
        'show' => 'show',
        'cargointurkey' => 'Cargo in Turkey',
        'amountofcargo' => 'The amount of cargo',
        'total' => 'Total',
        'number' => 'Number',
        'measure' => 'Measure',
        'deletelink' => 'Delete link',
        'tooltipdesc' => 'This is the amount you paid for the product cost and delivery fee for the parcels you brought to the country in the last 30 days through Kargo.az. It should be noted that according to the legislation, the customs duty is applied when the cost of mail delivered for personal use within 30 days and the delivery fee paid for it exceeds a total of $ 300.',
        'lastdays' => 'Last 30 days',
        'paymentcard' => 'Payment by card',
        'paymentcarddesc' => 'You can pay with any credit or debit card',
        'paymenttlbalance' => 'Payment with TL balance',
        'paymenttlbalancedsc' => 'If you have enough funds in your TL balance, you can pay',
        'yourtlbalance' => 'Your TL balance',
        'deliveryoffice' => 'Delivery office',
        'makepayment' => 'Make a payment',
        'noitnot' => 'No, its not',
        'theamountcargo' => 'The amount of cargo',
        'addanewlink' => 'Add a new link',
        'dateofordering' => 'Date of ordering',
        'send' => 'Send',
        'attention' => 'Attention',
        'attentiondesc' => 'Dear customers, when you place your orders yourself, the declaration must be attached by you. It is not possible to add a declaration without downloading invoices. Accurate and prompt completion of the declaration will help your parcels to pass customs inspection faster and without problems.',
        'mybalance' => 'My balance',
        'lastaddeddate' => 'Last added date',
        'lastaddeddatedesc' => 'Increase your balance to pay for delivery to Azerbaijan and order an online courier
                        you can.',
        'lastaddeddatedesc1' => 'THE INCREASED BALANCE IS NOT RETURNED.',
        'balanceincreasepayment' => 'BALANCE INCREASE FOR PAYMENT',
        'balanceincreases' => 'The balance increases',
        'min' => 'min',
        'max' => 'max',
        'balanceincreasesdesc' => 'Increase your balance over the National Front',
        'accountnumber' => 'Account number',
        'accountnumberdesc1' => 'You approach the MilliÖN terminal, enter the "Delivery Service" section and switch to the "kargo.az" section. To pay for transportation and courier service, select "kargo.az AZN". In the drop-down box, dial your account number above and click "Continue". Enter and confirm the amount required for delivery and courier service. After completing the transaction, the amount will immediately appear in your balance in your personal account on kargo.az.',
        'accountnumberdesc2' => 'Note: It is not possible to make purchases in Turkey with the delivery balance! Money transfer from AZN balance to TRY balance is not possible!',
        'expenditure' => 'Expenditure',
        'income' => 'Income',
        'history' => 'History',
        'amount' => 'Amount',
        'operation' => 'Operation',
        'increasebalance' => 'Increase balance',
        'orderpayment' => 'Order Payment',
        'card' => 'Card',
        'balance' => 'Balance',
        'accept' => 'Accept',
        'message' => 'message',
        'deliveryonlinecourier' => 'You can top up your balance to pay for delivery to Azerbaijan and order an online courier.',
        'increasenotreturned' => 'THE INCREASED BALANCE IS NOT RETURNED.',
        'amountyoupaiddelivery' => 'This is the amount you paid for the product cost and delivery fee for the parcels you brought to the country in the last 30 days through Kargo.az. It should be noted that according to the legislation, the customs duty is applied when the cost of mail delivered for personal use within 30 days and the delivery fee paid for it exceeds a total of $ 300.',
        'last30days' => 'Last 30 days',
        'type' => 'type',
        'refid' => 'refid',
        'date' => 'date',
        'profileinformation' => 'Profile Information',
        'other' => 'Other',
        'baku' => 'Baku',
        'ganja' => 'Ganja',
        'sumgayit' => 'Sumgayit',
        'zaqatala' => 'Zaqatala',
        'birthdate' => 'Birthdate',
        'save' => 'Save',
        'currentpassword' => 'Current Password',
        'enternewpassword' => 'Enter The New Password',
        'carefuladdingnewpassword!' => 'Be careful when adding a new password!',
        'usecharacterspassword' => 'Use characters in your password',
        'capitallettersyourpassword' => 'Use capital letters in your password',
        'usenumberinpassword' => 'Use a number in your password',
        'serialNumber' => 'Serial Number',
        'fin' => 'FIN',
        'user' => 'USER',
        'panel' => 'Panel',
        'exchangeratecalculator' => 'Exchange Rate Calculator',
        'select' => 'select',
        'calculate' => 'Calculate',
        'calculateexchange' => 'Calculated according to the exchange rate of the day.',
        'dailysize' => 'Daily size',
        'countrydetails' => 'Country details',
        'invoice.failed_success' => 'Failed success',
        'invoice.message.create_success' => 'Create success',
        'invoice.message.deleted_success' => 'Deleted_success',
        'invoice.store_success' => 'Store success',
        'order.failed_success' => 'Failed success',
        'order.store_success' => 'Create success',
        'general.message.create_success' => 'Create success',
        'general.message.paid_successful' => 'Paid successful',
        'general.message.inquiry_create_successful' =>'Inquiry create successful',
        'city' => 'City',
        'postal' => 'Postal',
        'country' => 'Country',
        'selectanarea' => 'Select an area',
        'district' => 'District',
        'home' => 'Home',
        'makeadditionalnotes' => 'Make additional notes',
        'confirm' => 'Confirm',
        'courierorderscheduledtime' => 'Your courier order is scheduled within 24 hours.',
        'courierworkinghours' => 'Courier working hours 10:00 - 19:00 (6 days a week)',
        'selectinvoices' => 'Select invoice',
        'bindingnumber'=> 'Binding number',
        'title' => 'Title',
        'lateorder' => 'Late order',
        'packagedoesnotbelongtome' => 'A package that does not belong to me',
        'complaintsandsuggestions' => 'Complaints and suggestions',
        'enterconfirmpassword' => 'Password Confirmation',
        'street' => 'Street',
        'admin' => 'Admin',
        'id' => 'ID'
    ];

    private $website_items = [
        'pricing' => 'Pricing',
        'howwework' => 'How we work',
        'blog' => 'Blog',
        'contact' => 'Contact',
        'login' => 'Login',
        'register' => 'Register',
        'dashboard' => 'dashboard',
        'setting' => 'setting',
        'settings' => 'settings',
        'order' => 'order',
        'orders' => 'orders',
        'invoices' => 'invoices',
        'invoice' => 'invoice',
        'balance' => 'balance',
        'logout' => 'logout',
        'transport' => 'transport',
        'subtitle2' => 'Global turkey logistics and transportation',
        'subtitle1' => 'services via sea, land and air.',
        'shipping' => 'shipping',
        'fee' => 'fee',
        'calculator' => 'calculator',
        'home_page.country' => 'country',
        'home_page.index' => 'home',
        'home_page.countries.turkey' => 'Turkey',
        'home_page.countries.chin' => 'Chin',
        'home_page.countries.usa' => 'USA',
        'home_page.countries.germany' => 'Germany',

        'home_page.region' => 'Region',
        'home_page.regions.baku' => 'Baku',
        'home_page.regions.ganja' => 'Ganja',
        'home_page.regions.sumgayit' => 'Sumgayit',
        'home_page.regions.zaqatala' => 'Zaqatala',

        'binding_number' => 'Binding number',

        'weight' => 'Weight',
        'home_page.weights.kg' => 'kg',
        'home_page.weights.gram' => 'gram',

        'home_page.en' => 'En',
        'home_page.sm' => 'sm',
        'home_page.m' => 'm',
        'home_page.dm' => 'dm',

        'length' => 'Length',
        'height' => 'Height',
        'calculate' => 'Calculate',
        'total' => 'Total',
        'call_center' => 'Call center',
        'free_call' => 'Give us a free call',
        'working_hours' => 'Working Hours',
        'our_location' => 'Our Location',
        'detailed_quote' => 'Get Detailed Quote',
        'service' => 'Service',
        'how' => 'How',
        'works' => 'works',
        'qediyattdangech' => 'Qediyattdan Gech',
        'referralbeejyola' => 'Referral beej yola',
        'obtainbaglama' => 'Obtain Baglama',
        'cargostorage' => 'Cargo Storage',
        'user' => 'user',
        'skillsexpertisedesc2' => 'skills and expertise',
        'skillsexpertise' => 'Reserved for consumer sterilized. Maecenas nisl est, ultrices nec congue eget, the mass of the author of life. Clinical mourning manufacturing propaganda and bananas. Now it only with arrows, but very ullamcorper and soccer. But now sterilized at the free financing, but the football scores. Until the child to the package of life, sit Sed gravida Vivamus venenatis. In ante ipsum congue eros does not warm-up. However, protein volleyball nibh gate.',
        'skillsexpertisedesc' => 'But I must explain to you how all this mistaken idea of denouncing pleasure and praising
                            pain was born and I will give you a complete account of the system, and expound the actual
                            teachings of the great explorer of the truth, the master-builder of human happiness. No one
                            rejects, dislikes, or avoids pleasure itself, because it is pleasure',
        'readmore' => 'Read more',
        'latest' => 'Latest',
        'newsevents' => 'news and events',
        'newsletter' => 'Newsletter',
        'subscribedesc' => 'subscribe to our newsletter to receive latest news',
        'subscribe' => 'Subscribe',
        'trustedby' => 'Trusted by international',
        'companies' => 'companies',
        'trustedbydesc1' => 'testimony from our great',
        'trustedbydesc2' => 'client worldwide company',
        'search' => 'Search',
        'share' => 'Share',
        'latestnews' => 'Latest news',
        'aboutdesc1' => 'But I must explain to you how all this mistaken idea',
        'aboutdesc2' => 'denouncing pleasure and praising pain,',
        'contactus' => 'Contact us',
        'faq' => 'FAQ',
        'registeron' => 'Register on Kargo.az and get a permanent address abroad.',
        'sendvote' => 'Send us your order',
        'sendvoteshopping' => 'When shopping in online stores, enter the address we provide you instead of the address where your package will be delivered.',
        'getpackage' => 'Get the package',
        'getpackageloc' => 'You can get your order from our Baku warehouse or use our courier service within 3-5 working days.',
        'balance.azn' => 'AZN',
        'balance.tl' => 'TL',
        'balance.courier' => 'Courier',
        'balance.inquiry' => 'Inquiry',
        'panelpage' => 'Panel page',
        'myaddressesabroad' => 'My addresses abroad',
        'myorders' => 'My orders',
        'mybindings' => 'My bindings',
        'aznbalance' => 'AZN Balance',
        'tlbalance' => 'TL Balance',
        'adjustments' => 'Adjustments',
        'signout' => 'Sign out',
        'aboutus' => 'About us',
        'ouraddress' => 'Our address',
        'cargo' => 'Cargo',
        'copyright' => 'All rights reserved to kargo.az international INC.',
        'how_title_page' => 'How we work',
        'home' => 'home',
        'send' => 'send',
        'contact_name' => 'Name',
        'contact_email' => 'Email',
        'contact_message' => 'Message',
//        shtormex
        'tariffs_by_countries' => 'TARIFFS BY COUNTRIES',
        'follow_video_instructions' => 'Follow the Video Instructions',
        'follow_video_instructions_new_style' => 'Discover a new style of shopping with Colibri',
        'follow_video_instructions_online_shopping' => 'With easy instructions, your online shopping will be more fun and hassle-free than ever.',
        'customers' => 'Customers',
        'google_play' => 'Install Google Play',
        'app_store' => 'Install App Store',
    ];
}
