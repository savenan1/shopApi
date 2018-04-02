/**
 * Created by zhangzenan on 2017/8/1.
 */

var test={
    ajax:function (url,data) {
        if(data){
            $.ajax(url,{
                type:'post',
                dateType:'json',
                data:data,
                success:function ($res) {
                    console.log($res);
                },
                error:function () {
                    console.error('failed!');
                }
            });
        }
        else{
            $.ajax(url,{
                type:'post',
                dateType:'json',
                success:function ($res) {
                    console.log($res);
                },
                error:function () {
                    console.error('failed!');
                }
            });
        }
    }
}

var testAPI={
    bindEvent:function () {
        var self=this;
        $('#test').on('click',function () {
            // self.testGetAllProducts();
            // self.testGetProductPhotoById();
            // self.testGetProductById();
            // self.testGetProductByBrand();
            // self.testGetAllBanners();
            // self.testGetVerifyCode();
            self.testCreateUser();
            // self.testLogin();
            // self.testAddAddress();
            // self.testModifyAddress();
            // self.testDeleteAddress();
            // self.testGetAddressByUserId();
            // self.testGetRecommendList();
            // self.testGetRecommendDetail();
            // self.testGetHotProduct();
            // self.testGetNewestProduct();
            // self.testGetWeiboList();
        });
    },
    testGetAllProducts:function () {
        test.ajax('/products/get-all-products');
    },
    testGetProductPhotoById:function () {
        test.ajax('/products/get-product-photo-by-id',{
            id:4
        });
    },
    testGetProductById:function () {
        test.ajax('/products/get-product-by-id',{
            id:4
        });
    },
    testGetProductByBrand:function () {
        test.ajax('/products/get-product-by-brand',{
            brandId:1
        });
    },
    testGetRecommendList:function () {
        test.ajax('/products/get-recommend-list',{
            page:1
        });
    },
    testGetRecommendDetail:function () {
        test.ajax('/products/get-recommend-detail',{
            rid:1
        });
    },
    testGetHotProduct:function () {
        test.ajax('/products/get-hot-product',{
            page:1
        });
    },
    testGetNewestProduct:function () {
        test.ajax('/products/get-newest-product',{
            page:1
        });
    },

    testGetAllBanners:function () {
        test.ajax('/banner/get-all-banners');
    },
    testGetVerifyCode:function () {
        test.ajax('/user/send-verify-msg',{
            mobile:'18123936005',
            token:'f6fd1e00406de6216561a762d54dc275'
        });
    },
    testCreateUser:function () {
        test.ajax('/user/create-user',{
            userName:'13510630197',
            passWord:md5('123456'),
            verifyCode:'2377',
        });
    },
    testLogin:function () {
        test.ajax('/user/login',{
            userName:'yourBaBa1',
            passWord:'123123',
            token:'sdsadsad'
        });
    },

    testAddAddress:function () {
        test.ajax('/order/add-address',{
            uid:2,
            mobile:'110',
            address:'世界花园海华居1',
            province:'广东省',
            city:'深圳市',
            town:'南山区',
        });
    },
    testModifyAddress:function () {
        test.ajax('/order/modify-address',{
            uid:2,
            addressId:1
        });
    },
    testDeleteAddress:function () {
        test.ajax('/order/delete-address',{
            uid:2,
            addressId:2
        });
    },
    testGetAddressByUserId:function () {
        test.ajax('/order/get-address-by-user-id',{
            uid:2,
        });
    },
    testGetWeiboList:function () {
        test.ajax('/weibo/get-weibo-list',{
            uid:1,
            page:1
        });
    },
};

$(function () {
    testAPI.bindEvent();
});
