$(function() {
    DialPad.init();
});
var DialPad={
    init:function() {
        // console.log('init() ---');
        this.filter();
        this.keypad();
        this.dialing();
        // $("body,html,img").bind("contextmenu selectstart dragstart",function(){return false});
    },
    dialing:function(){
        $('.people').click(function(){
            DialPad.call($(this));
        });
        $('.action .btn').click(function(){
            $(this).toggleClass('active');
        });
        $('.call-end').click(function(){
            $('.left-pan').removeClass('active');
            $('.calling').fadeOut(100);
            $('.contacts').fadeIn(800);
            $('.calling .photo').html('');
            $('.calling .name').html('Unknown');
            $('.calling .number').html('');
        });
    },
    longClick:function(){
        var pressTimer
        $('.dial-key-wrap[data-key="back"]').mouseup(function(){
            clearTimeout(pressTimer)
            return false;
        }).mousedown(function(){
            pressTimer = window.setTimeout(function() {
                $('#dial-screen').val('');
            },1000)
            return false;
        });
    },
    keypad:function() {
        // Mouse Click NUMPAD Events
        $('.dial-key-wrap').on('click',function(){
            var key = $(this).data('key');
            var display = $('#dial-screen').val();
            switch(key){
                case 'back':
                    DialPad.press($('.dial-key-wrap[data-key="back"]'));
                    display = $('#dial-screen').val(display.substring(0,display.length - 1));
                    DialPad.longClick();
                    break;
                case 'call':
                    DialPad.press($('.dial-key-wrap[data-key="call"]'));
                    DialPad.call();
                    break;
                case 0:
                    DialPad.press($('.dial-key-wrap[data-key="0"]'));
                    display = $('#dial-screen').val(display+'0');
                    break;
                case 1:
                    DialPad.press($('.dial-key-wrap[data-key="1"]'));
                    display = $('#dial-screen').val(display+'1');
                    break;
                case 2:
                    DialPad.press($('.dial-key-wrap[data-key="2"]'));
                    display = $('#dial-screen').val(display+'2');
                    break;
                case 3:
                    DialPad.press($('.dial-key-wrap[data-key="3"]'));
                    display = $('#dial-screen').val(display+'3');
                    break;
                case 4:
                    DialPad.press($('.dial-key-wrap[data-key="4"]'));
                    display = $('#dial-screen').val(display+'4');
                    break;
                case 5:
                    DialPad.press($('.dial-key-wrap[data-key="5"]'));
                    display = $('#dial-screen').val(display+'5');
                    break;
                case 6:
                    DialPad.press($('.dial-key-wrap[data-key="6"]'));
                    display = $('#dial-screen').val(display+'6');
                    break;
                case 7:
                    DialPad.press($('.dial-key-wrap[data-key="7"]'));
                    display = $('#dial-screen').val(display+'7');
                    break;
                case 8:
                    DialPad.press($('.dial-key-wrap[data-key="8"]'));
                    display = $('#dial-screen').val(display+'8');
                    break;
                case 9:
                    DialPad.press($('.dial-key-wrap[data-key="9"]'));
                    display = $('#dial-screen').val(display+'9');
                    break;
                case '*':
                    DialPad.press($('.dial-key-wrap[data-key="*"]'));
                    display = $('#dial-screen').val(display+'*');
                    break;
                case '#':
                    DialPad.press($('.dial-key-wrap[data-key="#"]'));
                    display = $('#dial-screen').val(display+'#');
                    break;
            }
            DialPad.filter();
        });

        // Keyboard NUMPAD Events
        $('.dial-pad-wrap').keydown(function(e) {
            // console.log('dial-pad-wrap ---- keydown');
            var key = e.which;
            var screen = $('#dial-screen').val();
            // console.log('key: ' + key);
            switch(e.which){
                case 8:
                    DialPad.press($('.dial-key-wrap[data-key="back"]'));
                    // console.log(screen.substring(0,screen.length - 1));

                    // FOR INPUT
                    screen = $('#dial-screen').val(screen.substring(0,screen.length - 1));

                    // FOR DIV
                    // screen = $('#dial-screen').text(screen.substring(0,screen.length - 1));
                    break;
                case 13:
                    DialPad.press($('.dial-key-wrap[data-key="call"]'));
                    DialPad.call();
                    break;
                case 96:
                    DialPad.press($('.dial-key-wrap[data-key="0"]'));
                    //screen = $('#dial-screen').val(screen+'0');
                    break;
                case 97:
                    DialPad.press($('.dial-key-wrap[data-key="1"]'));
                    //screen = $('#dial-screen').val(screen+'1');
                    break;
                case 98:
                    DialPad.press($('.dial-key-wrap[data-key="2"]'));
                    //screen = $('#dial-screen').val(screen+'2');
                    break;
                case 99:
                    DialPad.press($('.dial-key-wrap[data-key="3"]'));
                    //screen = $('#dial-screen').val(screen+'3');
                    break;
                case 100:
                    DialPad.press($('.dial-key-wrap[data-key="4"]'));
                    //screen = $('#dial-screen').val(screen+'4');
                    break;
                case 101:
                    DialPad.press($('.dial-key-wrap[data-key="5"]'));
                    //screen = $('#dial-screen').val(screen+'5');
                    break;
                case 102:
                    DialPad.press($('.dial-key-wrap[data-key="6"]'));
                    //screen = $('#dial-screen').val(screen+'6');
                    break;
                case 103:
                    DialPad.press($('.dial-key-wrap[data-key="7"]'));
                    //screen = $('#dial-screen').val(screen+'7');
                    break;
                case 104:
                    DialPad.press($('.dial-key-wrap[data-key="8"]'));
                    //screen = $('#dial-screen').val(screen+'8');
                    break;
                case 105:
                    DialPad.press($('.dial-key-wrap[data-key="9"]'));
                    //screen = $('#dial-screen').val(screen+'9');
                    break;
            }
            var array = [8,13,96,97,98,99,100,101,102,103,104,105];
            var prevent=true;
            for(var i=0;i<array.length;i++){
                if(key==array[i]){
                    DialPad.filter();
                    break;
                }
            }
            if(key==8){
                return false;
            }
        });

        $(".dial-pad-wrap").click(function() {
            $('#dial-screen').focus();
        });

        $("#dial_pad_btn").click(function() {
            setTimeout(
                () =>
                    (
                        document.querySelector(
                            '#dial-screen',
                        )
                    ).focus(),
                200,
            )
        });
    },
    call:function(info){
        var num = $('#dial-screen').val().length;
        if(num > 0){
            var photo,name,number;
            $('.left-pan').addClass('active');
            $('.contacts').fadeOut(100);
            $('.calling').fadeIn(800);
            if(info){
                photo = info.find('img').attr('src')?'<img src="'+info.find('img').attr('src')+'">':null;
                name = info.find('.name').text()?info.find('.name').text():'Unknown';
                number = info.find('.phone').text();
                $('.calling .photo').html(photo);
                $('.calling .name').text(name);
                $('.calling .number').text(number);
            }else{
                $('.calling .number').text($('#dial-screen').val());
            }
            setTimeout(function(){
                $('.call-end .btn').focus();
            },800);
        }
    },
    filter:function(){
        var highlight = function(string){
            $('.people .number.match').each(function(){
                var matchStart = $(this).text().toLowerCase().indexOf('' + string.toLowerCase() + '');
                var matchEnd = matchStart + string.length - 1;
                var beforeMatch = $(this).text().slice(0, matchStart);
                var matchText = $(this).text().slice(matchStart, matchEnd + 1);
                var afterMatch = $(this).text().slice(matchEnd + 1);
                $(this).html(beforeMatch + '<span class="highlight">' + matchText + '</span>' + afterMatch);
            });
        };
        var showcontact =  function(){
            $('.people .number').each(function(){
                if($(this).css('display')=='inline'){
                    $(this).parent().parent().parent().show();
                }else{
                    $(this).parent().parent().parent().hide();
                }
            });
        };
        //var refine = function(){
        var _this = $('#dial-screen');
        if(_this.text()){
            $('.people .number').removeClass('match').hide().filter(function(){
                return $(this).text().toLowerCase().indexOf(_this.text().toLowerCase()) != -1;
            }).addClass('match').show();
            highlight(_this.text());
            $('.people').show();
            showcontact();
        }else{
            $('.people,.people .number').removeClass('match').hide();
        }
        //};
    },
    press:function(obj){
        var button = obj.addClass('active');
        setTimeout(function () {
            button.removeClass('active');
        }, 200);
    }
}

/* ======================================
    Dial Calling Functions
   ====================================== */
$(".add-calling").click(function() {
    $("#kt_header_search_toggle").dropdown('toggle');
    $(".dial-pad-list").removeClass('d-none');
    $(".dial-search-list").addClass('d-none');
    setTimeout(
        () =>
            (
                document.querySelector(
                    '#dial-screen',
                )
            ).focus(),
        200,
    )
});

/* =======================================
    Company Profile edit Event Functions
   ======================================= */
$(".company-edit-profile ").click(function() {
    $(".company-profile").removeClass('active');
    $("#profile").removeClass('show active');
    $(".company-settings").addClass('active');
    $("#settings").addClass('show active');
});

/* =======================================
    Company Billing edit Event Functions
   ======================================= */

/* Add Bundle */
$(".add-billing-btn").click(function() {
    $(".company-profile").removeClass('active');
    $(".company-billing").removeClass('active');
    $("#billing").removeClass('show active');
    $(".company-bundle").addClass('active');
    $("#bundle").addClass('show active');
});