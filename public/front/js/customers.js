$('.categories').on('change',function(){
    let category = $(this).val();
    $('.categories').each(function(){
        if($(this).val() != category)
            $(this).prop('checked', false);
    })
    let url = window.location.href;

    url = url.replace('customer_groups=','');

    if($(this).is(':checked'))
        url += (url.includes('?'))?'&customer_groups='+$(this).val():'?customer_groups='+$(this).val();
    $('#customer').load(url+' #customers');
});
$('#search-button').click(function(){
    let name = $('#search').val();
    let url = window.location.href.split('?')[0];
    url += '?name='+name;
    $('#customer').load(url+' #customers');
});
$('body').on('keypress', '#search', function (e) {

    var key = e.which;
    if (key == 13)  // the enter key code
    {
        let name = $('#search').val();
        let url = window.location.href.split('?')[0];
        url += '?name='+name;
        $('#customer').load(url+' #customers');
    }
});

$('.country-button').on('click',function () {
    let countryId = $(this).attr('data-countryId');
    let url = window.location.href;

    url = url.replace('country_id=','');
    url = url.replace('customer_groups=','');

    url += (url.includes('?'))?'&country_id='+countryId:'?country_id='+countryId;
    $('#customer').load(url+' #customers');
});
