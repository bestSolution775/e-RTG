
var API_URL = "http://ssgrtrophy.com/e-RTG/public/";

function update_user(that){
  $("#update_user").modal()
  $("#userId").val(that.id);
  $("#userName").val(that.name);
  $("#userEmail").val(that.email);
}
function country_edit(that){

  $("#edit_country").modal()
  $("#country_id").val(that.id);
  $("#country_code").val(that.country_code);
  $("#country_title").val(that.country_title);
}

function distributor_edit(that){
  $("#edit_distributor").modal();
  $("#distributor_id").val(that.id);
  $("#distributor_company").val(that.distributor_company);
  $("#address_line1").val(that.address_line1);
  $("#address_line2").val(that.address_line2);
  $("#state").val(that.state);
  $("#postcode").val(that.postcode);
  $("#country_id").val(that.country_id);
}

function customer_edit(that){
  $("#edit_customer").modal();
  $("#customer_id").val(that.id);
  $("#customer_company").val(that.customer_company);
  $("#address_line1").val(that.address_line1);
  $("#address_line2").val(that.address_line2);
  $("#state").val(that.state);
  $("#postcode").val(that.postcode);
  $("#distributor_id").val(that.distributor_id);
  $("#country_id").val(that.country_id);
  $("#tag").val(that.tag);
  $("#ftphost").val(that.ftphost);
  $("#ftpusername").val(that.ftpusername);
  $("#ftppassword").val(that.ftppassword)
  $("#dbhost").val(that.dbhost);
  $("#dbuser").val(that.dbuser);
  $("#dbpassword").val(that.dbpassword);
  $("#dbname").val(that.dbname);
}

function category_edit(that){
  $("#adit_category").modal();
  $("#category_id").val(that.id);
  $("#title").val(that.title);
}
function attribute_edit(that){
  $("#adit_attribute").modal();
  $("#attribute_id").val(that.id);
  $("#title").val(that.title);
}

function item_edit(that){
  console.log(that)
  $("#edit_item").modal();
  $("#item_id").val(that.id);
  $("#sku").val(that.sku);
  $("#name").val(that.name);
  $("#price").val(that.price);
  $("#description").val(that.description);
  let property = Object.keys(that)
  let value = Object.values(that)
  for(var i=5;i<property.length-2;i++)
  {
    console.log(property[i])
    console.log(value[i])
    $("#"+property[i]).val(value[i]);
  }
}
function remove_attribute(id){
  $.ajax({
    type:"delete",
    url:API_URL + "attributes/"+id,
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    success:function(req)
    {
      if(req['success'] == 'Ok'){
        alert("The attribute was deleted successfully");
        window.location.reload()
      }
      else{
        alert("You can't remove this root item")
      }
    }
  })
}

function remove_category(id){
  $.ajax({
    type:"delete",
    url:API_URL + "categories/"+id,
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    success:function(req)
    {
      if(req['success'] == 'Ok'){
        alert("The category was deleted successfully");
        window.location.reload()
      }
      else{
        alert("You can't remove this root item")
      }
    }
  })
}

function pushtoretailer()
{
  let products_id = [];
  let customers_id = [];
  $("#product * input").each(function(){
    if(this.checked){
      products_id.push(this.value);
    }
  });
  $("#customer * input").each(function(){
    if(this.checked){
      customers_id.push(this.value);
    }
  });
  console.log(products_id)
  console.log(customers_id)
  $.ajax({
    url:API_URL +"pushtoretailers",
    method:'post',
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    data:{product_id:products_id,customer_id:customers_id},
    success:function(req)
    {
      alert("success");
    }
  })
}
$.fn.extend({
    treed: function (o) {
      
      var openedClass = 'material-icons';
      var closedClass = 'material-icons';
      
      if (typeof o != 'undefined'){
        if (typeof o.openedClass != 'undefined'){
        openedClass = o.openedClass;
        }
        if (typeof o.closedClass != 'undefined'){
        closedClass = o.closedClass;
        }
      };

        /* initialize each of the top levels */
        var tree = $(this);
        tree.addClass("tree");
        tree.find('li').has("ul").each(function () {
            var branch = $(this);
            branch.prepend("");
            branch.addClass('branch');
            branch.on('click', function (e) {
                if (this == e.target) {
                    var icon = $(this).children('i:first');
                    icon.toggleClass(openedClass + " " + closedClass);
                    if( icon.attr("data-id") == 0 )
                    { 
                      icon.text("arrow_drop_down");
                      icon.attr("data-id","1")
                    }
                    else
                    { 
                      icon.text("arrow_right");
                      icon.attr("data-id","0")
                    }
                    $(this).children().children().toggle();
                }
            })
            branch.children().children().toggle();
        });
        /* fire event from the dynamically added icon */
        tree.find('.branch .indicator').each(function(){
            $(this).on('click', function () {
                $(this).closest('li').click();
            });
        });
        /* fire event to open branch if the li contains an anchor instead of text */
        tree.find('.branch>a').each(function () {
            $(this).on('click', function (e) {
                $(this).closest('li').click();
                e.preventDefault();
            });
        });
        /* fire event to open branch if the li contains a button instead of text */
        tree.find('.branch>button').each(function () {
            $(this).on('click', function (e) {
                $(this).closest('li').click();
                e.preventDefault();
            });
        });
    }
});
/* Initialization of treeviews */
$('#tree1').treed();