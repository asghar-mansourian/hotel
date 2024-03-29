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
                        'key' => $key
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
        'file' => 'file',
        'stocks' => 'Stocks',
        'createstock' => 'create stocks',
        'text' => 'text',
        'pleasetitle' => 'Please Enter title...',
        'pleasestock' => 'Please Enter stock...',
        'pleaseorder' => 'Please Enter order...',
        'content' => 'Content',
        'content_ru' => 'content_ru',
        'content_az' => 'content_az',
        'cancel' => 'cancel',
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
        'addscript' => 'Add script',
        'addstock' => 'Add stock',
        'stockmessagecreate' => 'Stock created',
        'scriptmessagecreate' => 'script created',
        'scriptmessageupdate' => 'script updated',
        'addslider' => 'Add slider',
        'order_by' => 'order by',
        'editblog' => 'Edit blog',
        'editstock' => 'Edit stock',
        'stockmessageupdate' => 'stock updated',
        'stockmessagedelete' => 'stock deleted',
        'scriptmessagedelete' => 'script deleted',
        'editslider' => 'Edit slider',
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
        'option' => 'option',
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
        'paneltitle' => 'Panel',
        'showcontacts' => 'Show Contacts',
        'contacttitle' => 'Contact',
        'contacttableheader' => 'contact table header',
        'backcontact' => 'Back To Contact',
        'addcountry' => 'Add Country',
        'editcountry' => 'Edit Country',
        'blogtitle' => 'Blog',
        'stocktitle' => 'Stock',
        'slidertitle' => 'Slider',
        'paymenttitle' => 'Payment',
        'showpayment' => 'Show Payment',
        'blogtableheader' => 'blog table header',
        'stocktableheader' => 'stock table header',
        'slidertableheader' => 'slider table header',
        'branchtitle' => 'Branch',
        'branchtableheader' => 'branch table header',
        'flag' => 'flag',
        'tableid' => 'id',
        'tablename' => 'name',
        'tablemail' => 'email',
        'tablestatus' => 'status',
        'tabledescription' => 'description',
        'tablevalue' => 'value',
        'tablecurrency' => 'currency',
        'tableaction' => 'action',
        'tableactive' => 'active',
        'tabledeactive' => 'deactive',
        'tableshow' => 'show',
        'tableedit' => 'edit',
        'tabletitle' => 'tile',
        'tableaddress' => 'address',
        'tabledelete' => 'delete',
        'tableprice' => 'price',
        'tableauthority' => 'authority',
        'tablerefid' => 'refid',
        'tableorder_id' => 'order_id',
        'tableshop' => 'shop',
        'tablefrom' => 'from',
        'tableto' => 'to',
        'tablekey' => 'key',
        'tablelink' => 'link',
        'currency' => 'Currency',
        'pleaseentercurrency' => 'Please Enter Currency...',
        'countrytitle' => 'Country',
        'countrydetailtitle' => 'Country Detail',
        'countrytableheader' => 'country table header',
        'countrydetailstableheader' => 'country details table header',
        'adddetails' => 'Add details',
        'editpage' => 'Edit Page',
        'faqtitle' => 'FAQ',
        'faqtableheader' => 'faq table header',
        'addfaq' => 'Add faq',
        'editfaq' => 'Edit faq',
        'orderitemstitle' => 'Order Items',
        'scriptitemstitle' => 'Script Items',
        'orderitemstableheader' => 'order items table header',
        'scriptitemstableheader' => 'script items table header',
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
        'editcountrydetails' => 'Edit Country Details',
        'showinvoice' => 'Show Invoice',
        'togglenavigation' => 'Toggle Navigation',
        'admin' => 'Admin',
        'login' => 'Login',
        'forgetpass' => 'Forgot password?',
        'youdontaccount' => "You Don\'t have an account",
        'register' => 'Register',
        'registerhere' => 'Register Here',
        'createnuser' => 'Create New Account',
        'alreadyhaveaccount' => 'You Already have an account',
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
        'countrydetail' => 'country detail',
        'regions' => 'regions',
        'pages' => 'pages',
        'createpage' => 'create page',
        'blogs' => 'blogs',
        'create_blogs' => 'create blogs',
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
        'ordertitle' => 'Order',
        'ordertableheader' => 'Order Table',
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
        'editsetting' => 'Edit Setting',
        'regiontitle' => 'Region',
        'regiontableheader' => 'region table header',
        'key' => 'Key',
        'value' => 'Value',
        'pleaseentervalue' => 'Please Enter Value...',
        'editregion' => 'Edit Region',
        'settingtitle' => 'Setting',
        'showsettings' => 'Show Settings',
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
        'usertitle' => 'User',
        'usercreate' => 'create user',
        'usertableheader' => 'user table header',
        'birthdate' => 'Birthdate',
        'backtousers' => 'Back To Users',
        'users' => 'User',
        'hometitle' => 'Home Title',
        'showuser' => 'Show User',
        'calculator' => 'calculator',
        'showcalculator' => 'Showcalculator',
        'answer' => 'Answer',
        'send' => 'Send',
        'date' => 'date',
        'customers' => 'Customers',
        'generalmessagecustomer_create_successful' => 'Customer Create Successful',
        'generalmessagecustomer_update_successful' => 'Customer Update Successful',
        'generalmessagecustomer_delete_successful' => 'Customer Delete Successful',
        'customadmininquiryindextitle' => 'Inquiry Index',
        'singninaccount' => 'Sign In to your account',
        'edit_admin' => 'Edit Admin',
        'roles' => 'Roles',
        'add_role' => 'Add Roles',
        'purchased' => 'Purchased',
        'canceled_orders' => 'Canceled Orders',
        'outside_warehouse' => 'Outside Warehouse',
        'box_collection' => 'Box Collection',
        'went_to_box_airport' => 'Went to Box Airport',
        'box_reached_the_country' => 'Box Reached The Country',
        'in_the_country_ware_house' => 'In the country warehouse',
        'given_to_the_courier' => 'Given to the Courier',
        'given_to_customers' => 'given to Customers',
        'website_setting' => 'Website Setting',
        'cancel_orders' => 'Cancel Orders',
        'cancel_reason_orders' => 'Cancel Reason Orders',
        'reason_order_create' => 'Reason Order Create',
        'custom_script' => 'Custom Script',
        'price_items' => 'Price Items',
        'courier' => 'Courier',
        'region_and_country' => 'region & country',
        'sliders' => 'Sliders',
        'create_slider' => 'Create Slider',
        'inquiry' => 'inquiry',
        'create_faqs' => 'Create Faqs',
        'show_faqs' => 'Show Faqs',
        'roles_and_permissions' => 'Roles And Permissions',
        'permissions' => 'Permissions',
        'admins' => 'Admins',
        'manage_admins' => 'Manage Admins',
        'create_admin' => 'Create Admin',
        'admin_invoices' => 'Admin Invoices',
        'add_customers' => 'Add Customers',
        'print1' => 'Print 1',
        'print2' => 'Print 2',
        'customer_id_w' => 'Customer Id:',
        'Pack_N_w' => 'Pack.N:',
        'sender_w' => 'Sender',
        'reciever_w' => 'Reciever',
        'tel_w' => 'Tel: ',
        'postal_code_w' => 'Postal Code: ',
        'overseas_rack_number_w' => 'Overseas Rack Number: ',
        'domestic_rack_number_w' => 'Domestic Rack Number: ',
        'count_of_packages_w' => 'Count of packages',
        'total_gross_weight_w' => 'Total gross weight (kg)',
        'delivery_price_w' => 'Delivery Price(USD)',
        'invoice_price_w' => 'Invoice Price(USD)',
        'tracking_number_f2' => 'Tracking number :',
        'cargo_prepaid_f2' => 'Cargo Prepaid',
        'prepaid_f2' => 'Prepaid',
        'from_shipper_f2' => 'From(Shipper) :',
        'send_address_f2' => 'Send address :',
        'postal_code_f2' => 'Postal code :' ,
        'send_phone_f2' => 'Send Phone :',
        'to_consignee_f2' => 'To (Consignee):',
        'personal_id_f2' => 'Personal ID :',
        'delivery_address_f2' => 'Delivery adress :',
        'country_city_f2' => 'Country/City :',
        'website_f2' => 'Website :',
        'by_air_f2' => 'By Air',
        'total_number_of_packages_f2' => 'Total number of packages',
        'total_gross_weight_f2' => 'Total gross weight (kg)',
        'delivery_f2' => 'Delivery (USD)',
        'by_see_f2' => 'By Sea',
        'description_of_goods_f2' => 'Description of goods:',
        'category_f2' => 'Category :',
        'declaration_value_for_customs_f2' => 'Declaration value for customs :',
        'product_price_f2' => 'Product price',
        'delivery_price_f2' => 'Delivery price',
        'total_f2' => 'Total',
        'information_goods_filled_f2' => 'Information on goods filled by Consignee on by',
        'on_behalf_on_consignee_f2' => 'on behalf on Consignee',
        'box_f' => 'Box:',
        'number_of_packages_f' => 'Number of packages :',
        'weight_of_box_f' => 'Weight of box',
        'sender_address_f' => 'Sender Address :',
        'reciever_address_f' => 'Reciever Adress :',
    ];

    private $member_items = [
        'login' => 'Login',
        'no' => 'no',
        'yes' => 'yes',
        'items' => 'items',
        'edit' => 'edit',
        'delete' => 'delete',
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
        'warehouse_abroad' => 'warehouse_abroad',
        'on_way' => 'on_way',
        'customs_inspection' => 'customs_inspection',
        'in_warehouse' => 'in_warehouse',
        'courier_delivery' => 'courier_delivery',
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
        'invoiceName' => 'invoice Name',
        'productType' => 'product Type',
        'productNumber' => 'product Number',
        'orderTrackingCode'=>'order Tracking Code',
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
        'addrabroad' => 'address abroad',
        'noitnot' => 'No, its not',
        'yesitis' => 'Yes, it is',
        'theamountcargo' => 'The amount of cargo',
        'addanewlink' => 'Add a new link',
        'dateofordering' => 'Date of ordering',
        'productAbout' => 'product About',
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
        'details' => 'details',
        'invoicefailed_success' => 'Failed success',
        'invoicemessagecreate_success' => 'Create success',
        'invoicemessagedeleted_success' => 'Deleted_success',
        'invoicestore_success' => 'Store success',
        'orderfailed_success' => 'Failed success',
        'orderstore_success' => 'Create success',
        'generalmessagecreate_success' => 'Create success',
        'generalmessagepaid_successful' => 'Paid successful',
        'generalmessageinquiry_create_successful' => 'Inquiry create successful',
        'generalmessagecustomer_create_successful' => 'Customer create successful',
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
        'bindingnumber' => 'Binding number',
        'title' => 'Title',
        'lateorder' => 'Late order',
        'packagedoesnotbelongtome' => 'A package that does not belong to me',
        'complaintsandsuggestions' => 'Complaints and suggestions',
        'enterconfirmpassword' => 'Password Confirmation',
        'street' => 'Street',
        'admin' => 'Admin',
        'id' => 'ID',
        'answer' => 'Answer',
        'region' => 'region',
        'please_select_country' => 'please select country',
        'city_address' => 'please select country',
        'pack_to_order_a_courier' => 'You do not have to pack to order a courier',
        'forgotPassword' => 'Forgot password',
        'resetPasswordSuccess' => 'Reset Password Success. Please Check Your Email',
        'resetPassword' => 'Reset Password',
        'hello' => 'Hello',
        'regards' => 'Regards',
        'resetPasswordDescription' => 'You are receiving this email because we received a password reset request for your account.',
        'resetPasswordExpireDescription'=>'This password reset link will expire in 60 minutes.
        If you did not request a password reset, no further action is required.',
        'troubleClicking1' =>'If you’re having trouble clicking the ',
        'troubleClicking2' => 'button, copy and paste the URL below. into your web browser: ',
        'submit' => 'Submit',
        'copy' => 'copy',
        'close' => 'Close',
        'passwordRequired' => 'password is required',
        'passwordConfirmed' => 'The password confirmation does not match.',
        'userNotFound' => 'User not found',
        'payment_failed_try_again' => 'payment failed please try again',
        'readPolices' => 'Read Polices',
        'polices' => 'Polices',
        'policesList' => 'Polices List',
        'site_name' => 'Shtormex',
        'notAcceptPolices' => 'Not Accept',
        'mobileCodeVerification' => 'Mobile Code Verification',
        'enterVerificationCode' => 'Enter The Verification Code',
        'verify' => 'Verify',
        'resendVerificationCode' => 'Resend Verification Code',
        'newVerificationCodeSent' => 'New Verification Code Sent.',
        'productLink' => 'Product Link',
        'productDetails' => 'Product Details',
        'color' => 'color',
        'paid_success' => 'paid success',
        'paid_failed' => 'paid failed',
        'crawlerLinkError' => 'Please check link address',
        'weight' => 'Weight',
        'weight_price' => 'Weight Price',
        'product_category' => 'Product Category',

    ];

    private $website_items = [
        'pricing' => 'Pricing',
        'howwework' => 'How we work',
        'blog' => 'Blog',
        'smscodeerror' => 'Sms code is invalid',
        'newsmscodesend' => 'New code has been send',
        'newsmserror' => 'Please try again!',
        'successsmscode' => 'Correct, You confirmed',
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
        'home_pagecountry' => 'country',
        'home_pageindex' => 'home',
        'home_pagecountriesturkey' => 'Turkey',
        'home_pagecountrieschin' => 'Chin',
        'home_pagecountriesusa' => 'USA',
        'home_pagecountriesgermany' => 'Germany',

        'home_pageregion' => 'Region',
        'home_pageregionsbaku' => 'Baku',
        'home_pageregionsganja' => 'Ganja',
        'home_pageregionssumgayit' => 'Sumgayit',
        'home_pageregionszaqatala' => 'Zaqatala',

        'binding_number' => 'Binding number',

        'weight' => 'Weight',
        'home_pageweightskg' => 'kg',
        'home_pageweightsgram' => 'gram',

        'home_pageen' => 'En',
        'home_pagesm' => 'sm',
        'home_pagem' => 'm',
        'home_pagedm' => 'dm',

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
        'new' => 'New',
        'latestnews' => 'Latest news',
        'aboutdesc1' => 'But I must explain to you how all this mistaken idea',
        'aboutdesc2' => 'denouncing pleasure and praising pain,',
        'contactus' => 'Contact us',
        'faq' => 'FAQ',
        'howtitle' => 'How',
        'registeron' => 'Register on Kargo.az and get a permanent address abroad.',
        'sendvote' => 'Send us your order',
        'sendvoteshopping' => 'When shopping in online stores, enter the address we provide you instead of the address where your package will be delivered.',
        'getpackage' => 'Get the package',
        'getpackageloc' => 'You can get your order from our Baku warehouse or use our courier service within 3-5 working days.',
        'balanceazn' => 'AZN',
        'balancetl' => 'TL',
        'balancecourier' => 'Courier',
        'balanceinquiry' => 'Inquiry',
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
        'email' => 'email',
        'rememberme' => 'remember me',
        'forgotPassword' => 'forgotPassword',
        'submit' => 'submit',
        'close' => 'close',
        'name' => 'name',
        'family' => 'family',
        'passwordconfirmation' => 'password confirmation',
        'please_select_country' => 'please select country',
        'password' => 'password',
        'region' => 'region',
        'address' => 'address',
        'fin' => 'fin',
        'phone' => 'phone',
        'Agreepolicy' => 'agree policy',
        'contact_message' => 'Message',
//        shtormex
        'tariffs_by_countries' => 'TARIFFS BY COUNTRIES',
        'follow_video_instructions' => 'Follow the Video Instructions',
        'follow_video_instructions_new_style' => 'Discover a new style of shopping with Colibri',
        'follow_video_instructions_online_shopping' => 'With easy instructions, your online shopping will be more fun and hassle-free than ever.',
        'customers' => 'Customers',
        'google_play' => 'Install Google Play',
        'app_store' => 'Install App Store',
        'rules' => 'rules',
        'footer_bottom_left' => 'footer bottom left text',
        'header_up_right' => 'header up right text',
        'how_calculate' => 'How do I calculate?',
        'how_calculate_description' => 'Record the total amount of products you selected in the "Converter" section. The total amount you will pay in the calculator in manats',
        'country' => 'Country',
        'city' => 'City',
        'invoices_number' => 'Invoices Number',
        'note' => 'Note',
        'note_description' => 'Remember to take into account the amount of domestic cargo in Turkey required by the sellers in the amounts you calculate',
        'information' => 'Information',
        'company_information_description1' => 'Our company is engaged in the transportation of goods from Turkey and America. Your orders are delivered to Baku twice a week from Turkey and once a week from America.',
        'company_information_description2',
        'russia' => 'russia',
        'turkey' => 'turkey'
    ];
}
