<div class="col-sm-6 col-lg-4 text-center item mb-4">
    <span class="tag">New</span>
    <a href="<?= ROOT ?>detail/<?= $item->id ?>"> <img src="<?= ASSETS . "images/" . $item->image; ?>" alt="Product's image" class="product-image"></a>
    <p>
        <a class="product-name" href="<?= ROOT ?>detail/<?= $item->id ?>">
            <?= $item->name; ?>
        </a>
    </p>
    <p class="price">
        <!--<del>95.00</del>&mdash;--> <?= number_format($item->price); ?> vnđ
    </p>
    <p><a href="<?= ROOT ?>cart/add_to_cart/<?= $item->id ?>" class="buy-now btn btn-sm  btn-primary">Add To Cart</a></p>
</div>

<style>
    .product-name{
        font-family: 'Raleway', sans-serif;
        color: black;
        font-weight:bold;
        font-size:17px;

    }
    .product-image{
        width: 300px ;
        height: 350px;
        transition: all 0.5s ease ;

    }
    .product-image:hover{
        transform : scale(1.05);
    }
    
</style>

<script>
    function add_quantity(id) {
        send_data({
                id : id.trim()
            },"add_quantity");
    }
    function send_data(data = {}, data_type) {
        var ajax = new XMLHttpRequest(); //XMLHttpRequest - Tạo HTTP request đến server 
        ajax.addEventListener('readystatechange', function() //Một Event Handler lắng nghe và xử lý một sự kiện khi có thay đổi về trạng thái nào diễn ra.
        { 
            if (ajax.readyState == 4 && ajax.status == 200) {
                handle_result(ajax.responseText);
            }
        });
        ajax.open("POST", "<?= ROOT ?>cart/" + data_type + "/" + JSON.stringify(data), true); //JSON.stringify() lấy 1 đối tượng JavaScript và chuyển đổi nó thành 1 chuỗi JSON.
        ajax.send();
    }
    function handle_result(result){
        console.log(result);
        if(result != ""){
            var obj = JSON.parse(result); //nhận vào một chuỗi JSON và chuyển đổi (transform) nó thành một đối tượng JavaScript.
            if(typeof obj.data_type != 'undefined'){
                if(obj.data_type == "add_quantity"){
                    window.location.href = <?= ROOT ?>shop;
                }
            }
        }
    }
</script>