var $ = require('wetfish-basic');
var ajaxOptions =
{
    method: 'post',
    credentials: 'include',
    headers:
    {
        'Content-Type': 'application/json'
    }
};

$(document).ready(function()
{
    $('.upload-status').each(function()
    {
        $(this).value($(this).data('status'));
    });
    //add a volunteer to a slot
    $('.add-volunteer').on('click', function()
    {   
        if($('.user-search').hasClass('hidden'))
        {
            $(this).removeClass('btn-warning');
            $(this).addClass('btn-danger');
            $(this).text('Cancel');
            $('.user-search').removeClass('hidden');
        }
        else
        {   
            $(this).addClass('btn-warning');
            $(this).removeClass('btn-danger');
            $(this).text('Add Volunteer');
            $('.user-search').addClass('hidden');
            $('.user-wrap .loading').addClass('hidden');
            $('.users').addClass('hidden');
            $('.users table tbody tr').remove();
        }
       
    });



    // Display save / cancel buttons when changing user roles
    $('.user-roles input').on('change', function()
    {
        $('.buttons').style({visibility: 'visible', opacity: 1});
    });

    // Display save / cancel buttons when changing upload status
    $('.upload-status').on('change', function()
    {
        $(this).parents('.upload').find('.buttons').style({visibility: 'visible', opacity: 1});
    });

    // Display save / cancel buttons when changing volunteer status
    $('.volunteer-status').on('change', function()
    {
        $(this).parents('.volunteer').find('.buttons').style({visibility: 'visible', opacity: 1});
    });

    $('.save-roles').on('click', function()
    {
        var user = $('.user-id').value();
        var role = $('.user-role').value();
        var csrf = $('.csrf-token').value();
        var data =
        {
            roles: [],
            _token: csrf
        };

        $('.user-roles input').each(function()
        {
            if($(this).prop('checked'))
            {
                data.roles.push($(this).value());
            }
        });

        ajaxOptions.body = JSON.stringify(data);
        fetch('/user/' + user + '/edit', ajaxOptions);

        $('.user-role').data('role', role);
        $('.buttons').attr('style', false);
    });

    $('.cancel-roles').on('click', function()
    {
        $('.user-role').value($('.user-role').data('role'));
        $('.buttons').attr('style', false);
    });

    $('.save-upload').on('click', function()
    {
        var upload = $(this).parents('.upload').data('id');
        var status = $(this).parents('.upload').find('.upload-status').value();
        var csrf = $('.csrf-token').value();

        var data =
        {
            status: status,
            _token: csrf
        };

        ajaxOptions.body = JSON.stringify(data);

        fetch('/upload/' + upload + '/edit', ajaxOptions);
        $(this).parents('.upload').find('.upload-status').data('status', status);
        $(this).parents('.upload').find('.buttons').attr('style', false);
    });

    $('.cancel-upload').on('click', function()
    {
        var status = $(this).parents('.upload').find('.upload-status').data('status');
        $(this).parents('.upload').find('.upload-status').value(status);
        $(this).parents('.upload').find('.buttons').attr('style', false);
    });

    // volunteer status
    $('.save-status').on('click', function()
    {
        var status = $(this).parents('.volunteer').find('.volunteer-status').value();
        var csrf = $('.csrf-token').value();
        var slot = $('.slot-number').value();
        var data =
        {
            status: status,
            _token: csrf
        };

        ajaxOptions.body = JSON.stringify(data);
        fetch('/slot/'+ slot +'/edit', ajaxOptions);

        $(this).parents('.volunteer').find('.volunteer-status').data('status', status);
        $(this).parents('.volunteer').find('.buttons').attr('style', false);
    });

    $('.cancel-status').on('click', function()
    {
        var status = $(this).parents('.volunteer').find('.volunteer-status').data('status');
        $(this).parents('.volunteer').find('.volunteer-status').value(status);
        $(this).parents('.volunteer').find('.buttons').attr('style', false);
    });

    // Is there a volunteer status field on this page?
    if($('.volunteer-status').el.length)
    {
        // Populate status on page load
        var status = $('.volunteer-status').data('status');
        $('.volunteer-status').value(status);
    }
});
