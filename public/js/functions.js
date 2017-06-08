/**
 * add new form for parameters while create products (createProduct.blade.php)
 */
$(document).on('click','.add_button',function(){
    var button;
    var list;
    button=$(this);
    $.ajax({
        url: '/adminzone/products/parameters',
        type: "GET",
        success: function($list){
            button.after($list);
        },
        error: function(msg){
            console.log(msg);
        }
    });
});

/**
 * remove parameter from product (parameters.blade.php)
 */
$(document).on('click','.remove_button',function(){
    var block;
    if(confirm('Delete?'))
    {
        block=$(this).parent().parent().parent();
        block.remove();
    }
});

/**
 * show modal (parameters.blade.php)
 */
$(document).on('click','.add_parameter',function(){
    $('#myModal').modal();
});

/**
 * add new parameter for product (modal.blade.php)
 */
$(document).on('click','.save_and_close',function(){
    var title;
    var unit;
    title=$('.parameter_modal').val();
    unit=$('.unit_modal').val();
    $.ajax({
        url: '/adminzone/products/parameters',
        method: 'POST',
        data: {title:title,unit:unit},
        success: function(param)
        {
            $('select').append($('<option>', {value:param[0], text: param[1]+' '+param[2]}));
            $('#myModal').modal('hide');
        },
        error: function(msg){
            console.log(msg);
        }
    });
});

/**
 * clone field preview to add images for product (createProduct.blade.php)
 */
$(document).on('click','.add_images',function(){
    var all = $('input[name="preview[]"]');
    if(all.length==11) return;
    var field = $('input[name="preview[]"]:first').clone();
    $(this).after(field);
});

/**
 * delete image from product (editProduct.blade.php)
 */
$(document).on('click','.del_image',function(){
    div=$(this).parent();
    src=$(this).prev().attr('src');
    item_id=$("#item_id").val();
    $.ajax({
        url: '/adminzone/products/del_image',
        method: 'POST',
        data: {src:src,item_id:item_id},
        success: function(res)
        {
            div.remove();
        },
        error: function(msg)
        {
            console.log(msg);
        }
    });
});

/**
 * delete image from category (edit.blade.php)
 */
$(document).on('click','.del_image_category',function(){
    div=$(this).parent();
    src=$(this).prev().attr('src');
    item_id=$("#item_id").val();
    $.ajax({
        url: '/adminzone/category/del_image_category',
        method: 'POST',
        data: {src:src,item_id:item_id},
        success: function(res)
        {
            div.remove();
        },
        error: function(msg)
        {
            console.log(msg);
        }
    });
});

/**
 * delete product (categoryProduct.blade.php)
 */
$(document).on('click','.del_product',function() {
    id = parseInt($(this).attr('id'));
    confirm_var=confirm('Удалить продукт?');
    if (!confirm_var) return false;
    $.ajax({
        url:'/adminzone/products/'+id,
        method: 'DELETE',
        success: function(msg)
        {
            alert('Product "'+msg+'" destroy');
            window.location.reload();
        },
        error: function(msg)
        {
            console.log(msg);
        }
    });
});

/**
 * add product and amount to cookie (categoryProduct.blade.php and product.blade.php)
 */
$(document).on('click','.buy-btn',function(){
    item_id=parseInt($(this).attr('id'));
    order=$.cookie('basket');
    !order ? order=[]: order=JSON.parse(order);
    if(order.length==0)
    {
        order.push({'item_id': item_id, 'amount':1});
    }
    else
    {
        flag=false;
        for(var i=0; i<order.length; i++)
        {
            if(order[i].item_id==item_id)
            {
                order[i].amount=order[i].amount+1;
                flag=true;
            }

        }
        if(!flag)
        {
            order.push({'item_id': item_id, 'amount':1});
        }
    }
    $.cookie('basket',JSON.stringify(order),{path: '/'});
    count_order();
});

/**
 * count quantification of orders (navbar.blade.php)
 */
function count_order()
{
    order=$.cookie('basket');
    order ? order=JSON.parse(order): order=[];
    count=0;
    if(order.length>0)
    {
        for(var i=0; i<order.length; i++)
        {
            count=count+parseInt(order[i].amount);
        }
    }
    $('.count_order').html(count);
}
count_order();

/**
 * change amount of products in cookie (basket.blade.php)
 */
$(document).on('change', '.total', function() {
    value=$(this).val();
    if(value.match(/[^0-9]/g) || value<=0)
    {
        $(this).val('1');
        value=1;
    }
    item_id=$(this).parent().parent().children().first().html();
    set_amount(item_id,value);
    window.location.reload();
});

/**
 * set new amount
 * @param item_id
 * @param amount
 */
function set_amount(item_id, amount)
{
    order=JSON.parse($.cookie('basket'));

    for(var i=0;i<order.length; i++)
    {
        if(order[i].item_id == item_id)
        {
            order[i].amount = amount;
        }
    }
    $.cookie('basket',JSON.stringify(order));
    count_order();
}

/**
 * add to current value one item (basket.blade.php)
 */
$(document).on('click','.plus',function()
{
    current_val=$(this).prev().val();
    $(this).prev().val(+current_val+1);
    $('.total').change();
});

/**
 * delete from current value one item (basket.blade.php)
 */
$(document).on('click','.minus',function()
{
    current_val=$(this).prev().prev().val();
    new_val=+current_val-1;
    if(new_val<=0)
    {
        new_val=1;
    }
    $(this).prev().prev().val(new_val);
    $('.total').change();
});

/**
 * delete one product from basket (basket.blade.php)
 */
$(document).on('click','.del_order',function()
{
    string=$(this).parent().parent();
    item_id=$(this).parent().parent().children().first().html();
    string.remove();
    order=JSON.parse($.cookie('basket'));
    for(var i=0;i<order.length; i++)
    {
        if(order[i].item_id==item_id)
        {
            order.splice(i,1);
        }
    }
    $.cookie('basket',JSON.stringify(order));
    count_order();
    all_order=$('tr');
    if(all_order.length<=1) {location.reload()};
});

/**
 * delete category (admin.categories.blade.php)
 */
$(document).ready(function()
{
    $('.del_category').click(function()
    {
        parent=$(this).parent().parent();
        id=parent.children().first().html();
        confirm_var=confirm('Удалить категорию?');
        if (!confirm_var) return false;
        $.ajax({
            url:'/adminzone/categories/'+id,
            method: 'DELETE',
            success: function(msg)
            {
                parent.remove();
                alert('Category "'+msg+'" destroy');
            },
            error: function(msg)
            {
                console.log(msg);
            }
        });
    });
});

