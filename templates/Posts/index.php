<?php $this->assign('title', 'บทความ'); ?>



<style>
  /* .product_card1:hover {
        box-shadow: 1px 1px 1px 1px #888888;

    } */

  .postsImg {
    position: relative;
    width: 100%;
    height: 150px;
    overflow: hidden;
  }



  .posts_type {
    position: absolute;
    top: 10px;
    left: 6px;
  }

  @media screen and (max-width: 650px) {
    .postsImg {
      position: relative;
      width: 100%;
      height: 250px;
      overflow: hidden;
    }

  }


  .header-cover {
    height: 150px;
    overflow: hidden;
    position: relative;
    text-align: center;
  }

  .header-img {
    height: auto;
    object-fit: contain;
  }

  .centered {
    position: absolute;
    top: 50%;
    left: 50%;
    width: 100%;
    transform: translate(-50%, -50%);
  }

  .centered h1 {
    color: #4E7A61;
    font-size: 4rem;
  }
</style>


<div class="header-cover">
  <img class="header-img" src="https://img.freepik.com/premium-photo/ripe-fresh-avocado-green-background-top-view_185193-10955.jpg?w=2000" alt="">
  <div class="centered">
    <h1 class="m-0 p-0">บทความ</h1>
    <small>งานออกอีเว้นท์ บทความ ความรู้ แนะนำการท่องเที่ยว</small>
  </div>
</div>

<div class="container h-100">
  <div class="row my-5 p-0 m-0">
    <div class="col-sm-3 col-12 mb-2">
      <h5>ค้นหาข่าว</h5>
    </div>
    <div class="col-9 mb-2">
      <nav aria-label="text-end">
        <ol class="breadcrumb bg-transparent  p-0 m-0">
          <li class="breadcrumb-item"><a href="/">หน้าหลัก</a></li>
          <li class="breadcrumb-item active" aria-current="page">ข่าวสาร</li>
          <!-- <li class="breadcrumb-item active" aria-current="page">Data</li> -->
        </ol>
      </nav>
    </div>
    <div class="col-sm-3  col-12">
      <div class="card p-2">
        <label for="product_type">ตามชนิดสินค้า</label>
        <form id="sizes-form">
          <?php foreach ($PostsTypeData as  $data) : ?>
            <div class="form-check">
              <input class="form-check-input size-filter-check" type="checkbox" value="" id="size-check" data-size='<?= $data->pt_name ?>'>
              <label class="form-check-label" for="size-check">
                <?= $data->pt_name ?>
              </label>
            </div>
          <?php endforeach; ?>
        </form>
      </div>
    </div>
    <div class="col-sm-9 col-12 m-0 p-0">
      <div class="row m-0 p-0 " id="product_items">
      </div>
    </div>
  </div>
</div>

<script>
  var category_items = []
  $(document).ready(function() {
    $.ajax({
      url: "<?php echo $this->Url->build('/api/posts', ['fullBase' => true]); ?>",
      type: "GET",
      dataType: "json", // added data type
      success: function(result) {
        for (i = 0; i < result.length; i++) {
          category_items.push(result[i])
          console.log(result)
        }
        showAllItems();
      },
    });

    function clearDuplicates(data) {
      var temp = {};
      for (var i = 0; i < data.length; i++) {
        temp[data[i]['id']] = data[i];
      }
      return Object.values(temp);
    }

    let ProductsTypeArray = []; //Where the filtered sizes get stored


    $(".size-filter-check").click(function() {
      //When a checkbox is clicked
      let type_clicked = $(this).attr("data-size"); //The certain size checkbox clicked
      if ($(this).is(":checked")) {
        ProductsTypeArray.push(type_clicked); //Was not checked so add to filter array
        showItemsFiltered(); //Show items grid with filters
      } else {
        //Unchecked so remove from the array
        ProductsTypeArray = ProductsTypeArray.filter(function(elem) {
          return elem !== type_clicked;
        });
        showItemsFiltered(); //Show items grid with new filters
      }

      if (!$("input[type=checkbox]").is(":checked")) {
        //No checkboxes are checked
        ProductsTypeArray = []; //Clear size filter array
        showAllItems(); //Show all items with NO filters applied
      }

    });


    //Mock API data:
    function showAllItems() {
      //Default grid to show all items on page load in
      productItem = '';
      for (let i = 0; i < category_items.length; i++) {

        let id = category_items[i]['id'];
        let title = category_items[i]['title'];
        productItem +=
          `<div class="col-12 col-sm-4 py-2 swiper-slide">
                    <div class="card m-0  postsCard">
                        <div class="postsImg ">
                            <small class="text-muted posts_type badge badge-pill badge-success text-white m-0 ">${category_items[i]['type']}</small>
                            <img class="d-block w-100 " src="<?php echo $this->Url->build('/', ['fullBase' => true]); ?>${category_items[i]['image']}">
                        </div>
                        <div class="my-2 p-2">
                            <h5 class="col-12 text-truncate my-1 m-0 p-0">${category_items[i]['title']}</h5>
                            <p class="m-0 mt-3">${category_items[i]['user']}</p>
                            <p class="text-muted"><i class="fas fa-clock"></i> ${category_items[i].date}</p>
                            <a href="<?php echo $this->Url->build(['controller' => 'posts', 'action' => 'view',]); ?>/${category_items[i]['id']}-${category_items[i]['title']}" class="">
                            อ่านต่อ...
                            </a>
                        </div>
                    </div>
              </div>
                `;
      }
      $("#product_items").html(productItem);
    }

    function showItemsFiltered() {

      let FilteredItem = ""
      //Default grid to show all items on page load in
      for (let i = 0; i < category_items.length; i++) {
        //Go through the items but only show items that have size from ProductsTypeArray

        if (ProductsTypeArray.some((v) => category_items[i]['type'].includes(v))) {
          FilteredItem += `
          <div class="col-12 col-sm-4 py-2 swiper-slide">
                    <div class="card m-0  postsCard">
                        <div class="postsImg ">
                            <small class="text-muted posts_type badge badge-pill badge-success text-white m-0 ">${category_items[i]['type']}</small>
                            <img class="d-block w-100 " src="<?php echo $this->Url->build('/', ['fullBase' => true]); ?>${category_items[i]['image']}">
                        </div>
                        <div class="my-2 p-2">
                            <h5 class="col-12 text-truncate my-1 m-0 p-0">${category_items[i]['title']}</h5>
                            <p class="m-0 mt-3">${category_items[i]['user']}</p>
                            <p class="text-muted"><i class="fas fa-clock"></i> ${category_items[i].date}</p>
                            <a href="<?php echo $this->Url->build(['controller' => 'posts', 'action' => 'view',]); ?>/${category_items[i]['id']}-${category_items[i]['title']}" class="">
                            อ่านต่อ...
                            </a>
                        </div>
                    </div>
              </div>`;
        }
        $("#product_items").html(FilteredItem);
      }
    }
  });
</script>