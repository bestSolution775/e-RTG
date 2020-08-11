<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Customer;
use App\Http\Controllers\mysqli;
class PushToRetailerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Item::All();
        $customers = Customer::All();
        return view("/pushtoretailers/index", compact('products', 'customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validate_data = $request->validate([
            'product_id'=>'required',
            'customer_id'=>'required',
        ]);
        for ($i=0; $i<count($validate_data['customer_id']); $i++){
            $customers = Customer::find($validate_data['customer_id'][$i]);
            $servername = $customers['dbhost'];
            $username = $customers['dbuser'];
            $password = $customers['dbpassword'];
            $dbname = $customers['dbname'];
            $conn = mysqli_connect($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
                
            }
            for($j=0;$j<count($validate_data['product_id']);$j++){
                echo $validate_data['product_id'][$j];
                $products = Item::find($validate_data['product_id'][$j]);
                $date=date("Y-m-d h:i:s",time());
                $sqli = "INSERT INTO wpst_posts(post_title,post_content, post_type, post_author, post_name, post_date, post_date_gmt) VALUES ('$products->name','$products->description','product',1, '$products->name', '$date', '$date')";
                if ($conn->query($sqli) === TRUE) {
                    echo "New record created successfully\n";
                    $last_id = $conn->insert_id;
                    $sqli_image = "INSERT INTO wpst_posts(post_title, post_status, post_type, post_author, post_name, post_date, post_date_gmt, guid, post_parent, post_mime_type) VALUES ('$products->file_name','inherit','attachment',1, '$products->file_name', '$date', '$date','$products->file_url','$last_id','image/jpeg')";
                    if($conn->query($sqli_image) === True) {
                        echo "New record created successfully\n";
                        $term_sql = "INSERT INTO wpst_terms(name, slug, term_group) VALUES ('Uncategorized','uncategorized',0)";
                        if($conn->query($term_sql) === True) {     
                            $term_id = $conn->insert_id;
                            $termtax_sql = "INSERT INTO wpst_term_taxonomy(term_id, taxonomy, parent, count) VALUES ('$term_id','product_cat',0,1)";
                            if($conn->query($termtax_sql) === True) {     
                                $termtax_id = $conn->insert_id;
                                $termrelation_sql = "INSERT INTO wpst_term_relationships(object_id, term_taxonomy_id, term_order) VALUES ('$last_id','$termtax_id', 0)";
                                if($conn->query($termrelation_sql) === True) {     
                                    echo "New record created successfully\n";
                                }
                            }
                            else{
                            echo "Error: " . $termtax_sql . "<br>" . $conn->error;

                            }
                        }
                        else{
                            echo "Error: " . $term_sql . "<br>" . $conn->error;
                        }
                        
                      
                      
                        $sqli_meta1 = "INSERT INTO wpst_postmeta(post_id, meta_key, meta_value) VALUES ('$last_id', '_sale_price', '$products->price')";
                        $sqli_meta2 = "INSERT INTO wpst_postmeta(post_id, meta_key, meta_value) VALUES ('$last_id', '_price', '$products->price')";
                        if ($conn->query($sqli_meta1) === TRUE) {
                            echo "New record created successfully\n";
                            if($conn->query($sqli_meta2) === TRUE){
                                $last_id = $conn->insert_id;
                                echo "New record created successfully\n";
                                $sql = "INSERT INTO wpst_wc_product_meta_lookup(product_id, sku, min_price, max_price,onsale) VALUES ('$last_id', '$products->sku','$products->price','$products->price',1)";
                                
                                               
                                if ($conn->query($sql) === TRUE) {
                                    echo "New record created successfully\n";
                                } else {
                                    echo "Error: " . $sql . "<br>" . $conn->error;
                                }
                            }
                            else{
                                echo "Error: " . $sqli_meta1 . "<br>" . $conn->error;
                            }
                        } else {
                            echo "Error: " . $sqli_meta2 . "<br>" . $conn->error;  
                        }
                    }
                    else{
                        echo "Error: " . $sqli_image . "<br>" . $conn->error;
                    }
                    
                } else {
                    echo "Error: " . $sqli . "<br>" . $conn->error;
                }
                
            }
            $conn->close();
        }
      



        
        
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function search(Request $request)
    {
        $customers = Customer::search($request['customer_search'])->get();
        $products = Item::search($request['product_search'])->get();
        return view("/pushtoretailers/index", compact('customers', 'products'));
    }
}
