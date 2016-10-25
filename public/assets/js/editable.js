$(function(){
    //edit form style - popup or inline
    $.fn.editable.defaults.mode = 'popup';
    $.fn.editable.defaults.ajaxOptions = {type: "POST"};
    $(document).ready(function() {
        //TERMIN
    	$('.cash_dwi1').editable({
            success: function(response, newValue){
                $('#cash_dwi1').editable( 'setValue', parseInt(newValue) );
                $('#tambah').editable( 'setValue', parseInt(newValue) + parseInt($('.cash_dwi2').text()) - parseInt($('.realisasi').text()) );
                $('#total_termin').editable( 'setValue', parseInt(newValue) + parseInt($('.cash_dwi2').text()) - parseInt($('.realisasi').text()) );
            }
            });
        $('.cash_dwi2').editable({
            success: function(response, newValue){
                $('#cash_dwi2').editable( 'setValue', parseInt(newValue) );
                $('#tambah').editable( 'setValue', parseInt($('.cash_dwi1').text()) + parseInt(newValue) - parseInt($('.realisasi').text()) );
                $('#total_termin').editable( 'setValue', parseInt($('.cash_dwi1').text()) + parseInt(newValue) - parseInt($('.realisasi').text()) );
            }
            });
        $('.realisasi').editable({
            success: function(response, newValue){
                $('#realisasi').editable( 'setValue', parseInt(newValue) );
                $('#tambah').editable( 'setValue', parseInt($('.cash_dwi1').text()) + parseInt($('.cash_dwi2').text()) - parseInt(newValue) );
                $('#total_termin').editable( 'setValue', parseInt($('#cash_dwi1').text()) + parseInt($('#cash_dwi2').text()) - parseInt(newValue) );
            }
            });
        $('.ket').editable();
        //LOAN
        $('.cash_in').editable({
            success: function(response, newValue){
                $('#cash_in').editable( 'setValue', parseInt(newValue) );
                $('.surplus').editable( 'setValue', parseInt(newValue) - parseInt($('.cash_out').text()));
                $('#surplus').editable( 'setValue', parseInt(newValue) - parseInt($('#cash_out').text()));
                $('#after_surplus').editable( 'setValue', parseInt($('#after_surplus').text())-(parseInt($('.cash_in').text())-parseInt(newValue)));
                $('.after_surplus').editable( 'setValue', parseInt($('.after_surplus').text())-(parseInt($('.cash_in').text())-parseInt(newValue)));
            }
        });
        $('.cash_out').editable({
            success: function(response, newValue){
                $('#cash_out').editable( 'setValue', parseInt(newValue) );
                $('.surplus').editable( 'setValue', parseInt($('.cash_in').text()) - parseInt(newValue));
                $('#surplus').editable( 'setValue', parseInt($('#cash_in').text()) - parseInt(newValue));
                $('#after_surplus').editable( 'setValue', parseInt($('#after_surplus').text())+(parseInt($('.cash_out').text())-parseInt(newValue)) );
                $('.after_surplus').editable( 'setValue', parseInt($('.after_surplus').text())+(parseInt($('.cash_out').text())-parseInt(newValue)) );
            }
        });
        $('.loancash_dwi1').editable({
            success: function(response, newValue){
                $('#loancash_dwi1').editable( 'setValue', parseInt(newValue) );
                $('#after_surplus').editable( 'setValue', parseInt($('#after_surplus').text())+(parseInt($('.loancash_dwi1').text())-parseInt(newValue)) );
                $('.after_surplus').editable( 'setValue', parseInt($('.after_surplus').text())+(parseInt($('.loancash_dwi1').text())-parseInt(newValue)) );
            }
        });
        $('.loancash_dwi2').editable({
            success: function(response, newValue){
                $('#loancash_dwi2').editable( 'setValue', parseInt(newValue) );
                $('#after_surplus').editable( 'setValue', parseInt($('#after_surplus').text())+(parseInt($('.loancash_dwi2').text())-parseInt(newValue)) );
                $('.after_surplus').editable( 'setValue', parseInt($('.after_surplus').text())+(parseInt($('.loancash_dwi2').text())-parseInt(newValue)) );
            }
        });
        $('.loan_konvensional').editable({
            success: function(response, newValue){
                $('#loan_konvensional').editable( 'setValue', parseInt(newValue) );
                $('#after_surplus').editable( 'setValue', parseInt($('#after_surplus').text())+(parseInt($('.loan_konvensional').text())-parseInt(newValue)) );
                $('.after_surplus').editable( 'setValue', parseInt($('.after_surplus').text())+(parseInt($('.loan_konvensional').text())-parseInt(newValue)) );
            }
        });
        $('.loan_bank').editable({
            success: function(response, newValue){
                $('#loan_bank').editable( 'setValue', parseInt(newValue) );
                $('#after_surplus').editable( 'setValue', parseInt($('#after_surplus').text())+(parseInt($('.loan_bank').text())-parseInt(newValue)) );
                $('.after_surplus').editable( 'setValue', parseInt($('.after_surplus').text())+(parseInt($('.loan_bank').text())-parseInt(newValue)) );
            }
        });
        //CASHIN
        $('.cashin_rkp').editable({
            success: function(response, newValue){
                $('#cashin_rkp').editable( 'setValue', parseInt(newValue) );
            }
        });
        $('.cashin_jan').editable({
            success: function(response, newValue){
                $('#cashin_jan').editable( 'setValue', parseInt(newValue) );
                $('.cashin_th').editable( 'setValue', parseInt($('.cashin_th').text())-(parseInt($('.cashin_jan').text())-parseInt(newValue)) );
                $('#cashin_th').editable( 'setValue', parseInt($('#cashin_th').text())-(parseInt($('.cashin_jan').text())-parseInt(newValue)) );
                $('.cashin_total').editable( 'setValue', (parseInt($('.cashin_total').text())+parseInt($('.cashin_sblum').text())+parseInt($('.cashin_ssdah').text()))-(parseInt($('.cashin_jan').text())-parseInt(newValue)) );
                $('#cashin_total').editable( 'setValue', (parseInt($('#cashin_total').text())+parseInt($('#cashin_sblum').text())+parseInt($('#cashin_ssdah').text()))-(parseInt($('.cashin_jan').text())-parseInt(newValue)) );
            }
        });
        $('.cashin_feb').editable({
            success: function(response, newValue){
                $('#cashin_feb').editable( 'setValue', parseInt(newValue) );
                $('.cashin_th').editable( 'setValue', parseInt($('.cashin_th').text())-(parseInt($('.cashin_feb').text())-parseInt(newValue)) );
                $('#cashin_th').editable( 'setValue', parseInt($('#cashin_th').text())-(parseInt($('.cashin_feb').text())-parseInt(newValue)) );
                $('.cashin_total').editable( 'setValue', (parseInt($('.cashin_total').text())+parseInt($('.cashin_sblum').text())+parseInt($('.cashin_ssdah').text()))-(parseInt($('.cashin_feb').text())-parseInt(newValue)) );
                $('#cashin_total').editable( 'setValue', (parseInt($('#cashin_total').text())+parseInt($('#cashin_sblum').text())+parseInt($('#cashin_ssdah').text()))-(parseInt($('.cashin_feb').text())-parseInt(newValue)) );
            }
        });
        $('.cashin_mar').editable({
            success: function(response, newValue){
                $('#cashin_mar').editable( 'setValue', parseInt(newValue) );
                $('.cashin_th').editable( 'setValue', parseInt($('.cashin_th').text())-(parseInt($('.cashin_mar').text())-parseInt(newValue)) );
                $('#cashin_th').editable( 'setValue', parseInt($('#cashin_th').text())-(parseInt($('.cashin_mar').text())-parseInt(newValue)) );
                $('.cashin_total').editable( 'setValue', (parseInt($('.cashin_total').text())+parseInt($('.cashin_sblum').text())+parseInt($('.cashin_ssdah').text()))-(parseInt($('.cashin_mar').text())-parseInt(newValue)) );
                $('#cashin_total').editable( 'setValue', (parseInt($('#cashin_total').text())+parseInt($('#cashin_sblum').text())+parseInt($('#cashin_ssdah').text()))-(parseInt($('.cashin_mar').text())-parseInt(newValue)) );
            }
        });
        $('.cashin_apr').editable({
            success: function(response, newValue){
                $('#cashin_apr').editable( 'setValue', parseInt(newValue) );
                $('.cashin_th').editable( 'setValue', parseInt($('.cashin_th').text())-(parseInt($('.cashin_apr').text())-parseInt(newValue)) );
                $('#cashin_th').editable( 'setValue', parseInt($('#cashin_th').text())-(parseInt($('.cashin_apr').text())-parseInt(newValue)) );
                $('.cashin_total').editable( 'setValue', (parseInt($('.cashin_total').text())+parseInt($('.cashin_sblum').text())+parseInt($('.cashin_ssdah').text()))-(parseInt($('.cashin_apr').text())-parseInt(newValue)) );
                $('#cashin_total').editable( 'setValue', (parseInt($('#cashin_total').text())+parseInt($('#cashin_sblum').text())+parseInt($('#cashin_ssdah').text()))-(parseInt($('.cashin_apr').text())-parseInt(newValue)) );
            }
        });
        $('.cashin_mei').editable({
            success: function(response, newValue){
                $('#cashin_mei').editable( 'setValue', parseInt(newValue) );
                $('.cashin_th').editable( 'setValue', parseInt($('.cashin_th').text())-(parseInt($('.cashin_mei').text())-parseInt(newValue)) );
                $('#cashin_th').editable( 'setValue', parseInt($('#cashin_th').text())-(parseInt($('.cashin_mei').text())-parseInt(newValue)) );
                $('.cashin_total').editable( 'setValue', (parseInt($('.cashin_total').text())+parseInt($('.cashin_sblum').text())+parseInt($('.cashin_ssdah').text()))-(parseInt($('.cashin_mei').text())-parseInt(newValue)) );
                $('#cashin_total').editable( 'setValue', (parseInt($('#cashin_total').text())+parseInt($('#cashin_sblum').text())+parseInt($('#cashin_ssdah').text()))-(parseInt($('.cashin_mei').text())-parseInt(newValue)) );
            }
        });
        $('.cashin_jun').editable({
            success: function(response, newValue){
                $('#cashin_jun').editable( 'setValue', parseInt(newValue) );
                $('.cashin_th').editable( 'setValue', parseInt($('.cashin_th').text())-(parseInt($('.cashin_jun').text())-parseInt(newValue)) );
                $('#cashin_th').editable( 'setValue', parseInt($('#cashin_th').text())-(parseInt($('.cashin_jun').text())-parseInt(newValue)) );
                $('.cashin_total').editable( 'setValue', (parseInt($('.cashin_total').text())+parseInt($('.cashin_sblum').text())+parseInt($('.cashin_ssdah').text()))-(parseInt($('.cashin_jun').text())-parseInt(newValue)) );
                $('#cashin_total').editable( 'setValue', (parseInt($('#cashin_total').text())+parseInt($('#cashin_sblum').text())+parseInt($('#cashin_ssdah').text()))-(parseInt($('.cashin_jun').text())-parseInt(newValue)) );
            }
        });
        $('.cashin_jul').editable({
            success: function(response, newValue){
                $('#cashin_jul').editable( 'setValue', parseInt(newValue) );
                $('.cashin_th').editable( 'setValue', parseInt($('.cashin_th').text())-(parseInt($('.cashin_jul').text())-parseInt(newValue)) );
                $('#cashin_th').editable( 'setValue', parseInt($('#cashin_th').text())-(parseInt($('.cashin_jul').text())-parseInt(newValue)) );
                $('.cashin_total').editable( 'setValue', (parseInt($('.cashin_total').text())+parseInt($('.cashin_sblum').text())+parseInt($('.cashin_ssdah').text()))-(parseInt($('.cashin_jul').text())-parseInt(newValue)) );
                $('#cashin_total').editable( 'setValue', (parseInt($('#cashin_total').text())+parseInt($('#cashin_sblum').text())+parseInt($('#cashin_ssdah').text()))-(parseInt($('.cashin_jul').text())-parseInt(newValue)) );
            }
        });
        $('.cashin_agt').editable({
            success: function(response, newValue){
                $('#cashin_agt').editable( 'setValue', parseInt(newValue) );
                $('.cashin_th').editable( 'setValue', parseInt($('.cashin_th').text())-(parseInt($('.cashin_agt').text())-parseInt(newValue)) );
                $('#cashin_th').editable( 'setValue', parseInt($('#cashin_th').text())-(parseInt($('.cashin_agt').text())-parseInt(newValue)) );
                $('.cashin_total').editable( 'setValue', (parseInt($('.cashin_total').text())+parseInt($('.cashin_sblum').text())+parseInt($('.cashin_ssdah').text()))-(parseInt($('.cashin_agt').text())-parseInt(newValue)) );
                $('#cashin_total').editable( 'setValue', (parseInt($('#cashin_total').text())+parseInt($('#cashin_sblum').text())+parseInt($('#cashin_ssdah').text()))-(parseInt($('.cashin_agt').text())-parseInt(newValue)) );
            }
        });
        $('.cashin_sep').editable({
            success: function(response, newValue){
                $('#cashin_sep').editable( 'setValue', parseInt(newValue) );
                $('.cashin_th').editable( 'setValue', parseInt($('.cashin_th').text())-(parseInt($('.cashin_sep').text())-parseInt(newValue)) );
                $('#cashin_th').editable( 'setValue', parseInt($('#cashin_th').text())-(parseInt($('.cashin_sep').text())-parseInt(newValue)) );
                $('.cashin_total').editable( 'setValue', (parseInt($('.cashin_total').text())+parseInt($('.cashin_sblum').text())+parseInt($('.cashin_ssdah').text()))-(parseInt($('.cashin_sep').text())-parseInt(newValue)) );
                $('#cashin_total').editable( 'setValue', (parseInt($('#cashin_total').text())+parseInt($('#cashin_sblum').text())+parseInt($('#cashin_ssdah').text()))-(parseInt($('.cashin_sep').text())-parseInt(newValue)) );
            }
        });
        $('.cashin_okt').editable({
            success: function(response, newValue){
                $('#cashin_okt').editable( 'setValue', parseInt(newValue) );
                $('.cashin_th').editable( 'setValue', parseInt($('.cashin_th').text())-(parseInt($('.cashin_okt').text())-parseInt(newValue)) );
                $('#cashin_th').editable( 'setValue', parseInt($('#cashin_th').text())-(parseInt($('.cashin_okt').text())-parseInt(newValue)) );
                $('.cashin_total').editable( 'setValue', (parseInt($('.cashin_total').text())+parseInt($('.cashin_sblum').text())+parseInt($('.cashin_ssdah').text()))-(parseInt($('.cashin_okt').text())-parseInt(newValue)) );
                $('#cashin_total').editable( 'setValue', (parseInt($('#cashin_total').text())+parseInt($('#cashin_sblum').text())+parseInt($('#cashin_ssdah').text()))-(parseInt($('.cashin_okt').text())-parseInt(newValue)) );
            }
        });
        $('.cashin_nov').editable({
            success: function(response, newValue){
                $('#cashin_nov').editable( 'setValue', parseInt(newValue) );
                $('.cashin_th').editable( 'setValue', parseInt($('.cashin_th').text())-(parseInt($('.cashin_nov').text())-parseInt(newValue)) );
                $('#cashin_th').editable( 'setValue', parseInt($('#cashin_th').text())-(parseInt($('.cashin_nov').text())-parseInt(newValue)) );
                $('.cashin_total').editable( 'setValue', (parseInt($('.cashin_total').text())+parseInt($('.cashin_sblum').text())+parseInt($('.cashin_ssdah').text()))-(parseInt($('.cashin_nov').text())-parseInt(newValue)) );
                $('#cashin_total').editable( 'setValue', (parseInt($('#cashin_total').text())+parseInt($('#cashin_sblum').text())+parseInt($('#cashin_ssdah').text()))-(parseInt($('.cashin_nov').text())-parseInt(newValue)) );
            }
        });
        $('.cashin_des').editable({
            success: function(response, newValue){
                $('#cashin_des').editable( 'setValue', parseInt(newValue) );
                $('.cashin_th').editable( 'setValue', parseInt($('.cashin_th').text())-(parseInt($('.cashin_des').text())-parseInt(newValue)) );
                $('#cashin_th').editable( 'setValue', parseInt($('#cashin_th').text())-(parseInt($('.cashin_des').text())-parseInt(newValue)) );
                $('.cashin_total').editable( 'setValue', (parseInt($('.cashin_total').text())+parseInt($('.cashin_sblum').text())+parseInt($('.cashin_ssdah').text()))-(parseInt($('.cashin_des').text())-parseInt(newValue)) );
                $('#cashin_total').editable( 'setValue', (parseInt($('#cashin_total').text())+parseInt($('#cashin_sblum').text())+parseInt($('#cashin_ssdah').text()))-(parseInt($('.cashin_des').text())-parseInt(newValue)) );
            }
        });
        //CASHOUT
        $('.cashout_proyek').editable({
            success: function(response, newValue){
                $('#cashout_pdf').editable( 'setValue', (parseInt($('#cashout_pdf').text())+parseInt($('.cashout_depar').text())+parseInt($('.cashout_fasilitas').text()))-(parseInt($('#cashout_pdf').text())-parseInt(newValue)) );
            }
        });
        $('.cashout_depar').editable({
            success: function(response, newValue){
                $('#cashout_pdf').editable( 'setValue', (parseInt($('#cashout_pdf').text())+parseInt($('.cashout_proyek').text())+parseInt($('.cashout_fasilitas').text()))-(parseInt($('#cashout_pdf').text())-parseInt(newValue)) );
            }
        });
        $('.cashout_fasilitas').editable({
            success: function(response, newValue){
                $('#cashout_pdf').editable( 'setValue', (parseInt($('#cashout_pdf').text())+parseInt($('.cashout_proyek').text())+parseInt($('.cashout_depar').text()))-(parseInt($('#cashout_pdf').text())-parseInt(newValue)) );
            }
        });
        $('.cashout_janp').editable({
            success: function(response, newValue){
                $('#cashout_jan').editable( 'setValue', (parseInt($('#cashout_jan').text())+parseInt($('.cashout_jand').text())+parseInt($('.cashout_janf').text()))-(parseInt($('#cashout_jan').text())-parseInt(newValue)) );
                $('.cashout_jump').editable( 'setValue', parseInt($('.cashout_jump').text())+parseInt($('.cashout_sblump').text())+parseInt($('.cashout_ssdahp').text())+(parseInt(newValue)-parseInt($('.cashout_janp').text())) );
                $('#cashout_jumpdf').editable( 'setValue', parseInt($('.cashout_jump').text())+parseInt($('.cashout_jumd').text())+parseInt($('.cashout_jumf').text()) );
                $('.cashout_totalp').editable( 'setValue', parseInt($('.cashout_totalp').text())+parseInt($('.cashout_sblump').text())+parseInt($('.cashout_ssdahp').text())+(parseInt(newValue)-parseInt($('.cashout_janp').text())) );
                $('#cashout_total').editable( 'setValue', parseInt($('.cashout_totalp').text())+parseInt($('.cashout_totald').text())+parseInt($('.cashout_totalf').text()) );
            }
        });
        $('.cashout_jand').editable({
            success: function(response, newValue){
                $('#cashout_jan').editable( 'setValue', (parseInt($('#cashout_jan').text())+parseInt($('.cashout_janf').text())+parseInt($('.cashout_janp').text()))-(parseInt($('#cashout_jan').text())-parseInt(newValue)) );
                $('.cashout_jumd').editable( 'setValue', parseInt($('.cashout_jumd').text())+parseInt($('.cashout_sblumd').text())+parseInt($('.cashout_ssdahd').text())+(parseInt(newValue)-parseInt($('.cashout_jand').text())) );
                $('#cashout_jumpdf').editable( 'setValue', parseInt($('.cashout_jump').text())+parseInt($('.cashout_jumd').text())+parseInt($('.cashout_jumf').text()) );
                $('.cashout_totald').editable( 'setValue', parseInt($('.cashout_totald').text())+parseInt($('.cashout_sblumd').text())+parseInt($('.cashout_ssdahd').text())+(parseInt(newValue)-parseInt($('.cashout_jand').text())) );
                $('#cashout_total').editable( 'setValue', parseInt($('.cashout_totalp').text())+parseInt($('.cashout_totald').text())+parseInt($('.cashout_totalf').text()) );
            }
        });
        $('.cashout_janf').editable({
            success: function(response, newValue){
                $('#cashout_jan').editable( 'setValue', (parseInt($('#cashout_jan').text())+parseInt($('.cashout_jand').text())+parseInt($('.cashout_janp').text()))-(parseInt($('#cashout_jan').text())-parseInt(newValue)) );
                $('.cashout_jumf').editable( 'setValue', parseInt($('.cashout_jumf').text())+parseInt($('.cashout_sblumf').text())+parseInt($('.cashout_ssdahf').text())+(parseInt(newValue)-parseInt($('.cashout_janf').text())) );
                $('#cashout_jumpdf').editable( 'setValue', parseInt($('.cashout_jump').text())+parseInt($('.cashout_jumd').text())+parseInt($('.cashout_jumf').text()) );
                $('.cashout_totalf').editable( 'setValue', (parseInt($('.cashout_totalf').text())+parseInt($('.cashout_sblumf').text())+parseInt($('.cashout_ssdahf').text()))+(parseInt(newValue)-parseInt($('.cashout_janf').text())) );
                $('#cashout_total').editable( 'setValue', parseInt($('.cashout_totalp').text())+parseInt($('.cashout_totald').text())+parseInt($('.cashout_totalf').text()) );
            }
        });
        $('.cashout_febp').editable({
            success: function(response, newValue){
                $('#cashout_feb').editable( 'setValue', (parseInt($('#cashout_feb').text())+parseInt($('.cashout_febd').text())+parseInt($('.cashout_febf').text()))-(parseInt($('#cashout_feb').text())-parseInt(newValue)) );
                $('.cashout_jump').editable( 'setValue', parseInt($('.cashout_jump').text())+parseInt($('.cashout_sblump').text())+parseInt($('.cashout_ssdahp').text())+(parseInt(newValue)-parseInt($('.cashout_febp').text())) );
                $('#cashout_jumpdf').editable( 'setValue', parseInt($('.cashout_jump').text())+parseInt($('.cashout_jumd').text())+parseInt($('.cashout_jumf').text()) );
                $('.cashout_totalp').editable( 'setValue', (parseInt($('.cashout_totalp').text())+parseInt($('.cashout_sblump').text())+parseInt($('.cashout_ssdahp').text()))+(parseInt(newValue)-parseInt($('.cashout_febp').text())) );
                $('#cashout_total').editable( 'setValue', parseInt($('.cashout_totalp').text())+parseInt($('.cashout_totald').text())+parseInt($('.cashout_totalf').text()) );
            }
        });
        $('.cashout_febd').editable({
            success: function(response, newValue){
                $('#cashout_feb').editable( 'setValue', (parseInt($('#cashout_feb').text())+parseInt($('.cashout_febf').text())+parseInt($('.cashout_febp').text()))-(parseInt($('#cashout_feb').text())-parseInt(newValue)) );
                $('.cashout_jumd').editable( 'setValue', parseInt($('.cashout_jumd').text())+parseInt($('.cashout_sblumd').text())+parseInt($('.cashout_ssdahd').text())+(parseInt(newValue)-parseInt($('.cashout_febd').text())) );
                $('#cashout_jumpdf').editable( 'setValue', parseInt($('.cashout_jump').text())+parseInt($('.cashout_jumd').text())+parseInt($('.cashout_jumf').text()) );
                $('.cashout_totald').editable( 'setValue', (parseInt($('.cashout_totald').text())+parseInt($('.cashout_sblumd').text())+parseInt($('.cashout_ssdahd').text()))+(parseInt(newValue)-parseInt($('.cashout_febd').text())) );
                $('#cashout_total').editable( 'setValue', parseInt($('.cashout_totalp').text())+parseInt($('.cashout_totald').text())+parseInt($('.cashout_totalf').text()) );
            }
        });
        $('.cashout_febf').editable({
            success: function(response, newValue){
                $('#cashout_feb').editable( 'setValue', (parseInt($('#cashout_feb').text())+parseInt($('.cashout_febd').text())+parseInt($('.cashout_febp').text()))-(parseInt($('#cashout_feb').text())-parseInt(newValue)) );
                $('.cashout_jumf').editable( 'setValue', parseInt($('.cashout_jumf').text())+parseInt($('.cashout_sblumf').text())+parseInt($('.cashout_ssdahf').text())+(parseInt(newValue)-parseInt($('.cashout_febf').text())) );
                $('#cashout_jumpdf').editable( 'setValue', parseInt($('.cashout_jump').text())+parseInt($('.cashout_jumd').text())+parseInt($('.cashout_jumf').text()) );
                $('.cashout_totalf').editable( 'setValue', (parseInt($('.cashout_totalf').text())+parseInt($('.cashout_sblumf').text())+parseInt($('.cashout_ssdahf').text()))+(parseInt(newValue)-parseInt($('.cashout_febf').text())) );
                $('#cashout_total').editable( 'setValue', parseInt($('.cashout_totalp').text())+parseInt($('.cashout_totald').text())+parseInt($('.cashout_totalf').text()) );
            }
        });
        $('.cashout_marp').editable({
            success: function(response, newValue){
                $('#cashout_mar').editable( 'setValue', (parseInt($('#cashout_mar').text())+parseInt($('.cashout_mard').text())+parseInt($('.cashout_marf').text()))-(parseInt($('#cashout_mar').text())-parseInt(newValue)) );
                $('.cashout_jump').editable( 'setValue', parseInt($('.cashout_jump').text())+parseInt($('.cashout_sblump').text())+parseInt($('.cashout_ssdahp').text())+(parseInt(newValue)-parseInt($('.cashout_marp').text())) );
                $('#cashout_jumpdf').editable( 'setValue', parseInt($('.cashout_jump').text())+parseInt($('.cashout_jumd').text())+parseInt($('.cashout_jumf').text()) );
                $('.cashout_totalp').editable( 'setValue', parseInt($('.cashout_totalp').text())+parseInt($('.cashout_sblumd').text())+parseInt($('.cashout_ssdahd').text())+(parseInt(newValue)-parseInt($('.cashout_marp').text())) );
                $('#cashout_total').editable( 'setValue', parseInt($('.cashout_totalp').text())+parseInt($('.cashout_totald').text())+parseInt($('.cashout_totalf').text()) );
            }
        });
        $('.cashout_mard').editable({
            success: function(response, newValue){
                $('#cashout_mar').editable( 'setValue', (parseInt($('#cashout_mar').text())+parseInt($('.cashout_marf').text())+parseInt($('.cashout_marp').text()))-(parseInt($('#cashout_mar').text())-parseInt(newValue)) );
                $('.cashout_jumd').editable( 'setValue', parseInt($('.cashout_jumd').text())+parseInt($('.cashout_sblumd').text())+parseInt($('.cashout_ssdahd').text())+(parseInt(newValue)-parseInt($('.cashout_mard').text())) );
                $('#cashout_jumpdf').editable( 'setValue', parseInt($('.cashout_jump').text())+parseInt($('.cashout_jumd').text())+parseInt($('.cashout_jumf').text()) );
                $('.cashout_totald').editable( 'setValue', parseInt($('.cashout_totald').text())+parseInt($('.cashout_sblumd').text())+parseInt($('.cashout_ssdahd').text())+(parseInt(newValue)-parseInt($('.cashout_mard').text())) );
                $('#cashout_total').editable( 'setValue', parseInt($('.cashout_totalp').text())+parseInt($('.cashout_totald').text())+parseInt($('.cashout_totalf').text()) );
            }
        });
        $('.cashout_marf').editable({
            success: function(response, newValue){
                $('#cashout_mar').editable( 'setValue', (parseInt($('#cashout_mar').text())+parseInt($('.cashout_mard').text())+parseInt($('.cashout_marp').text()))-(parseInt($('#cashout_mar').text())-parseInt(newValue)) );
                $('.cashout_jumf').editable( 'setValue', parseInt($('.cashout_jumf').text())+parseInt($('.cashout_sblumf').text())+parseInt($('.cashout_ssdahf').text())+(parseInt(newValue)-parseInt($('.cashout_marf').text())) );
                $('#cashout_jumpdf').editable( 'setValue', parseInt($('.cashout_jump').text())+parseInt($('.cashout_jumd').text())+parseInt($('.cashout_jumf').text()) );
                $('.cashout_totalf').editable( 'setValue', (parseInt($('.cashout_totalf').text())+parseInt($('.cashout_sblumf').text())+parseInt($('.cashout_ssdahf').text()))+(parseInt(newValue)-parseInt($('.cashout_marf').text())) );
                $('#cashout_total').editable( 'setValue', parseInt($('.cashout_totalp').text())+parseInt($('.cashout_totald').text())+parseInt($('.cashout_totalf').text()) );
            }
        });
        $('.cashout_aprp').editable({
            success: function(response, newValue){
                $('#cashout_apr').editable( 'setValue', (parseInt($('#cashout_apr').text())+parseInt($('.cashout_aprd').text())+parseInt($('.cashout_aprf').text()))-(parseInt($('#cashout_apr').text())-parseInt(newValue)) );
                $('.cashout_jump').editable( 'setValue', parseInt($('.cashout_jump').text())+parseInt($('.cashout_sblump').text())+parseInt($('.cashout_ssdahp').text())+(parseInt(newValue)-parseInt($('.cashout_aprp').text())) );
                $('#cashout_jumpdf').editable( 'setValue', parseInt($('.cashout_jump').text())+parseInt($('.cashout_jumd').text())+parseInt($('.cashout_jumf').text()) );
                $('.cashout_totalp').editable( 'setValue', (parseInt($('.cashout_totalp').text())+parseInt($('.cashout_sblump').text())+parseInt($('.cashout_ssdahp').text()))+(parseInt(newValue)-parseInt($('.cashout_aprp').text())) );
                $('#cashout_total').editable( 'setValue', parseInt($('.cashout_totalp').text())+parseInt($('.cashout_totald').text())+parseInt($('.cashout_totalf').text()) );
            }
        });
        $('.cashout_aprd').editable({
            success: function(response, newValue){
                $('#cashout_apr').editable( 'setValue', (parseInt($('#cashout_apr').text())+parseInt($('.cashout_aprf').text())+parseInt($('.cashout_aprp').text()))-(parseInt($('#cashout_apr').text())-parseInt(newValue)) );
                $('.cashout_jumd').editable( 'setValue', parseInt($('.cashout_jumd').text())+parseInt($('.cashout_sblumd').text())+parseInt($('.cashout_ssdahd').text())+(parseInt(newValue)-parseInt($('.cashout_aprd').text())) );
                $('#cashout_jumpdf').editable( 'setValue', parseInt($('.cashout_jump').text())+parseInt($('.cashout_jumd').text())+parseInt($('.cashout_jumf').text()) );
                $('.cashout_totald').editable( 'setValue', (parseInt($('.cashout_totald').text())+parseInt($('.cashout_sblumd').text())+parseInt($('.cashout_ssdahd').text()))+(parseInt(newValue)-parseInt($('.cashout_aprd').text())) );
                $('#cashout_total').editable( 'setValue', parseInt($('.cashout_totalp').text())+parseInt($('.cashout_totald').text())+parseInt($('.cashout_totalf').text()) );
            }
        });
        $('.cashout_aprf').editable({
            success: function(response, newValue){
                $('#cashout_apr').editable( 'setValue', (parseInt($('#cashout_apr').text())+parseInt($('.cashout_aprd').text())+parseInt($('.cashout_aprp').text()))-(parseInt($('#cashout_apr').text())-parseInt(newValue)) );
                $('.cashout_jumf').editable( 'setValue', parseInt($('.cashout_jumf').text())+parseInt($('.cashout_sblumf').text())+parseInt($('.cashout_ssdahf').text())+(parseInt(newValue)-parseInt($('.cashout_aprf').text())) );
                $('#cashout_jumpdf').editable( 'setValue', parseInt($('.cashout_jump').text())+parseInt($('.cashout_jumd').text())+parseInt($('.cashout_jumf').text()) );
                $('.cashout_totalf').editable( 'setValue', (parseInt($('.cashout_totalf').text())+parseInt($('.cashout_sblumf').text())+parseInt($('.cashout_ssdahf').text()))+(parseInt(newValue)-parseInt($('.cashout_aprf').text())) );
                $('#cashout_total').editable( 'setValue', parseInt($('.cashout_totalp').text())+parseInt($('.cashout_totald').text())+parseInt($('.cashout_totalf').text()) );
            }
        });
        $('.cashout_meip').editable({
            success: function(response, newValue){
                $('#cashout_mei').editable( 'setValue', (parseInt($('#cashout_mei').text())+parseInt($('.cashout_meid').text())+parseInt($('.cashout_meif').text()))-(parseInt($('#cashout_mei').text())-parseInt(newValue)) );
                $('.cashout_jump').editable( 'setValue', parseInt($('.cashout_jump').text())+parseInt($('.cashout_sblump').text())+parseInt($('.cashout_ssdahp').text())+(parseInt(newValue)-parseInt($('.cashout_meip').text())) );
                $('#cashout_jumpdf').editable( 'setValue', parseInt($('.cashout_jump').text())+parseInt($('.cashout_jumd').text())+parseInt($('.cashout_jumf').text()) );
                $('.cashout_totalp').editable( 'setValue', parseInt($('.cashout_totalp').text())+parseInt($('.cashout_sblumd').text())+parseInt($('.cashout_ssdahd').text())+(parseInt(newValue)-parseInt($('.cashout_meip').text())) );
                $('#cashout_total').editable( 'setValue', parseInt($('.cashout_totalp').text())+parseInt($('.cashout_totald').text())+parseInt($('.cashout_totalf').text()) );
            }
        });
        $('.cashout_meid').editable({
            success: function(response, newValue){
                $('#cashout_mei').editable( 'setValue', (parseInt($('#cashout_mei').text())+parseInt($('.cashout_meif').text())+parseInt($('.cashout_meip').text()))-(parseInt($('#cashout_mei').text())-parseInt(newValue)) );
                $('.cashout_jumd').editable( 'setValue', parseInt($('.cashout_jumd').text())+parseInt($('.cashout_sblumd').text())+parseInt($('.cashout_ssdahd').text())+(parseInt(newValue)-parseInt($('.cashout_meid').text())) );
                $('#cashout_jumpdf').editable( 'setValue', parseInt($('.cashout_jump').text())+parseInt($('.cashout_jumd').text())+parseInt($('.cashout_jumf').text()) );
                $('.cashout_totald').editable( 'setValue', parseInt($('.cashout_totald').text())+parseInt($('.cashout_sblumd').text())+parseInt($('.cashout_ssdahd').text())+(parseInt(newValue)-parseInt($('.cashout_meid').text())) );
                $('#cashout_total').editable( 'setValue', parseInt($('.cashout_totalp').text())+parseInt($('.cashout_totald').text())+parseInt($('.cashout_totalf').text()) );
            }
        });
        $('.cashout_meif').editable({
            success: function(response, newValue){
                $('#cashout_mei').editable( 'setValue', (parseInt($('#cashout_mei').text())+parseInt($('.cashout_meid').text())+parseInt($('.cashout_meip').text()))-(parseInt($('#cashout_mei').text())-parseInt(newValue)) );
                $('.cashout_jumf').editable( 'setValue', parseInt($('.cashout_jumf').text())+parseInt($('.cashout_sblumf').text())+parseInt($('.cashout_ssdahf').text())+(parseInt(newValue)-parseInt($('.cashout_meif').text())) );
                $('#cashout_jumpdf').editable( 'setValue', parseInt($('.cashout_jump').text())+parseInt($('.cashout_jumd').text())+parseInt($('.cashout_jumf').text()) );
                $('.cashout_totalf').editable( 'setValue', (parseInt($('.cashout_totalf').text())+parseInt($('.cashout_sblumf').text())+parseInt($('.cashout_ssdahf').text()))+(parseInt(newValue)-parseInt($('.cashout_meif').text())) );
                $('#cashout_total').editable( 'setValue', parseInt($('.cashout_totalp').text())+parseInt($('.cashout_totald').text())+parseInt($('.cashout_totalf').text()) );
            }
        });
        $('.cashout_junp').editable({
            success: function(response, newValue){
                $('#cashout_jun').editable( 'setValue', (parseInt($('#cashout_jun').text())+parseInt($('.cashout_jund').text())+parseInt($('.cashout_junf').text()))-(parseInt($('#cashout_jun').text())-parseInt(newValue)) );
                $('.cashout_jump').editable( 'setValue', parseInt($('.cashout_jump').text())+parseInt($('.cashout_sblump').text())+parseInt($('.cashout_ssdahp').text())+(parseInt(newValue)-parseInt($('.cashout_junp').text())) );
                $('#cashout_jumpdf').editable( 'setValue', parseInt($('.cashout_jump').text())+parseInt($('.cashout_jumd').text())+parseInt($('.cashout_jumf').text()) );
                $('.cashout_totalp').editable( 'setValue', (parseInt($('.cashout_totalp').text())+parseInt($('.cashout_sblump').text())+parseInt($('.cashout_ssdahp').text()))+(parseInt(newValue)-parseInt($('.cashout_junp').text())) );
                $('#cashout_total').editable( 'setValue', parseInt($('.cashout_totalp').text())+parseInt($('.cashout_totald').text())+parseInt($('.cashout_totalf').text()) );
            }
        });
        $('.cashout_jund').editable({
            success: function(response, newValue){
                $('#cashout_jun').editable( 'setValue', (parseInt($('#cashout_jun').text())+parseInt($('.cashout_junf').text())+parseInt($('.cashout_junp').text()))-(parseInt($('#cashout_jun').text())-parseInt(newValue)) );
                $('.cashout_jumd').editable( 'setValue', parseInt($('.cashout_jumd').text())+parseInt($('.cashout_sblumd').text())+parseInt($('.cashout_ssdahd').text())+(parseInt(newValue)-parseInt($('.cashout_jund').text())) );
                $('#cashout_jumpdf').editable( 'setValue', parseInt($('.cashout_jump').text())+parseInt($('.cashout_jumd').text())+parseInt($('.cashout_jumf').text()) );
                $('.cashout_totald').editable( 'setValue', (parseInt($('.cashout_totald').text())+parseInt($('.cashout_sblumd').text())+parseInt($('.cashout_ssdahd').text()))+(parseInt(newValue)-parseInt($('.cashout_jund').text())) );
                $('#cashout_total').editable( 'setValue', parseInt($('.cashout_totalp').text())+parseInt($('.cashout_totald').text())+parseInt($('.cashout_totalf').text()) );
            }
        });
        $('.cashout_junf').editable({
            success: function(response, newValue){
                $('#cashout_jun').editable( 'setValue', (parseInt($('#cashout_jun').text())+parseInt($('.cashout_jund').text())+parseInt($('.cashout_junp').text()))-(parseInt($('#cashout_jun').text())-parseInt(newValue)) );
                $('.cashout_jumf').editable( 'setValue', parseInt($('.cashout_jumf').text())+parseInt($('.cashout_sblumf').text())+parseInt($('.cashout_ssdahf').text())+(parseInt(newValue)-parseInt($('.cashout_junf').text())) );
                $('#cashout_jumpdf').editable( 'setValue', parseInt($('.cashout_jump').text())+parseInt($('.cashout_jumd').text())+parseInt($('.cashout_jumf').text()) );
                $('.cashout_totalf').editable( 'setValue', (parseInt($('.cashout_totalf').text())+parseInt($('.cashout_sblumf').text())+parseInt($('.cashout_ssdahf').text()))+(parseInt(newValue)-parseInt($('.cashout_junf').text())) );
                $('#cashout_total').editable( 'setValue', parseInt($('.cashout_totalp').text())+parseInt($('.cashout_totald').text())+parseInt($('.cashout_totalf').text()) );
            }
        });
        $('.cashout_julp').editable({
            success: function(response, newValue){
                $('#cashout_jul').editable( 'setValue', (parseInt($('#cashout_jul').text())+parseInt($('.cashout_juld').text())+parseInt($('.cashout_julf').text()))-(parseInt($('#cashout_jul').text())-parseInt(newValue)) );
                $('.cashout_jump').editable( 'setValue', parseInt($('.cashout_jump').text())+parseInt($('.cashout_sblump').text())+parseInt($('.cashout_ssdahp').text())+(parseInt(newValue)-parseInt($('.cashout_julp').text())) );
                $('#cashout_jumpdf').editable( 'setValue', parseInt($('.cashout_jump').text())+parseInt($('.cashout_jumd').text())+parseInt($('.cashout_jumf').text()) );
                $('.cashout_totalp').editable( 'setValue', parseInt($('.cashout_totalp').text())+parseInt($('.cashout_sblumd').text())+parseInt($('.cashout_ssdahd').text())+(parseInt(newValue)-parseInt($('.cashout_julp').text())) );
                $('#cashout_total').editable( 'setValue', parseInt($('.cashout_totalp').text())+parseInt($('.cashout_totald').text())+parseInt($('.cashout_totalf').text()) );
            }
        });
        $('.cashout_juld').editable({
            success: function(response, newValue){
                $('#cashout_jul').editable( 'setValue', (parseInt($('#cashout_jul').text())+parseInt($('.cashout_julf').text())+parseInt($('.cashout_julp').text()))-(parseInt($('#cashout_jul').text())-parseInt(newValue)) );
                $('.cashout_jumd').editable( 'setValue', parseInt($('.cashout_jumd').text())+parseInt($('.cashout_sblumd').text())+parseInt($('.cashout_ssdahd').text())+(parseInt(newValue)-parseInt($('.cashout_juld').text())) );
                $('#cashout_jumpdf').editable( 'setValue', parseInt($('.cashout_jump').text())+parseInt($('.cashout_jumd').text())+parseInt($('.cashout_jumf').text()) );
                $('.cashout_totald').editable( 'setValue', parseInt($('.cashout_totald').text())+parseInt($('.cashout_sblumd').text())+parseInt($('.cashout_ssdahd').text())+(parseInt(newValue)-parseInt($('.cashout_juld').text())) );
                $('#cashout_total').editable( 'setValue', parseInt($('.cashout_totalp').text())+parseInt($('.cashout_totald').text())+parseInt($('.cashout_totalf').text()) );
            }
        });
        $('.cashout_julf').editable({
            success: function(response, newValue){
                $('#cashout_jul').editable( 'setValue', (parseInt($('#cashout_jul').text())+parseInt($('.cashout_juld').text())+parseInt($('.cashout_julp').text()))-(parseInt($('#cashout_jul').text())-parseInt(newValue)) );
                $('.cashout_jumf').editable( 'setValue', parseInt($('.cashout_jumf').text())+parseInt($('.cashout_sblumf').text())+parseInt($('.cashout_ssdahf').text())+(parseInt(newValue)-parseInt($('.cashout_julf').text())) );
                $('#cashout_jumpdf').editable( 'setValue', parseInt($('.cashout_jump').text())+parseInt($('.cashout_jumd').text())+parseInt($('.cashout_jumf').text()) );
                $('.cashout_totalf').editable( 'setValue', (parseInt($('.cashout_totalf').text())+parseInt($('.cashout_sblumf').text())+parseInt($('.cashout_ssdahf').text()))+(parseInt(newValue)-parseInt($('.cashout_julf').text())) );
                $('#cashout_total').editable( 'setValue', parseInt($('.cashout_totalp').text())+parseInt($('.cashout_totald').text())+parseInt($('.cashout_totalf').text()) );
            }
        });
        $('.cashout_agtp').editable({
            success: function(response, newValue){
                $('#cashout_agt').editable( 'setValue', (parseInt($('#cashout_agt').text())+parseInt($('.cashout_agtd').text())+parseInt($('.cashout_agtf').text()))-(parseInt($('#cashout_agt').text())-parseInt(newValue)) );
                $('.cashout_jump').editable( 'setValue', parseInt($('.cashout_jump').text())+parseInt($('.cashout_sblump').text())+parseInt($('.cashout_ssdahp').text())+(parseInt(newValue)-parseInt($('.cashout_agtp').text())) );
                $('#cashout_jumpdf').editable( 'setValue', parseInt($('.cashout_jump').text())+parseInt($('.cashout_jumd').text())+parseInt($('.cashout_jumf').text()) );
                $('.cashout_totalp').editable( 'setValue', (parseInt($('.cashout_totalp').text())+parseInt($('.cashout_sblump').text())+parseInt($('.cashout_ssdahp').text()))+(parseInt(newValue)-parseInt($('.cashout_agtp').text())) );
                $('#cashout_total').editable( 'setValue', parseInt($('.cashout_totalp').text())+parseInt($('.cashout_totald').text())+parseInt($('.cashout_totalf').text()) );
            }
        });
        $('.cashout_agtd').editable({
            success: function(response, newValue){
                $('#cashout_agt').editable( 'setValue', (parseInt($('#cashout_agt').text())+parseInt($('.cashout_agtf').text())+parseInt($('.cashout_agtp').text()))-(parseInt($('#cashout_agt').text())-parseInt(newValue)) );
                $('.cashout_jumd').editable( 'setValue', parseInt($('.cashout_jumd').text())+parseInt($('.cashout_sblumd').text())+parseInt($('.cashout_ssdahd').text())+(parseInt(newValue)-parseInt($('.cashout_agtd').text())) );
                $('.cashout_totald').editable( 'setValue', (parseInt($('.cashout_totald').text())+parseInt($('.cashout_sblumd').text())+parseInt($('.cashout_ssdahd').text()))+(parseInt(newValue)-parseInt($('.cashout_agtd').text())) );
                $('#cashout_jumpdf').editable( 'setValue', parseInt($('.cashout_jump').text())+parseInt($('.cashout_jumd').text())+parseInt($('.cashout_jumf').text()) );
                $('#cashout_total').editable( 'setValue', parseInt($('.cashout_totalp').text())+parseInt($('.cashout_totald').text())+parseInt($('.cashout_totalf').text()) );
            }
        });
        $('.cashout_agtf').editable({
            success: function(response, newValue){
                $('#cashout_agt').editable( 'setValue', (parseInt($('#cashout_agt').text())+parseInt($('.cashout_agtd').text())+parseInt($('.cashout_agtp').text()))-(parseInt($('#cashout_agt').text())-parseInt(newValue)) );
                $('.cashout_jumf').editable( 'setValue', parseInt($('.cashout_jumf').text())+parseInt($('.cashout_sblumf').text())+parseInt($('.cashout_ssdahf').text())+(parseInt(newValue)-parseInt($('.cashout_agtf').text())) );
                $('#cashout_jumpdf').editable( 'setValue', parseInt($('.cashout_jump').text())+parseInt($('.cashout_jumd').text())+parseInt($('.cashout_jumf').text()) );
                $('.cashout_totalf').editable( 'setValue', (parseInt($('.cashout_totalf').text())+parseInt($('.cashout_sblumf').text())+parseInt($('.cashout_ssdahf').text()))+(parseInt(newValue)-parseInt($('.cashout_agtf').text())) );
                $('#cashout_total').editable( 'setValue', parseInt($('.cashout_totalp').text())+parseInt($('.cashout_totald').text())+parseInt($('.cashout_totalf').text()) );
            }
        });
        $('.cashout_sepp').editable({
            success: function(response, newValue){
                $('#cashout_sep').editable( 'setValue', (parseInt($('#cashout_sep').text())+parseInt($('.cashout_sepd').text())+parseInt($('.cashout_sepf').text()))-(parseInt($('#cashout_sep').text())-parseInt(newValue)) );
                $('.cashout_jump').editable( 'setValue', parseInt($('.cashout_jump').text())+parseInt($('.cashout_sblump').text())+parseInt($('.cashout_ssdahp').text())+(parseInt(newValue)-parseInt($('.cashout_sepp').text())) );
                $('#cashout_jumpdf').editable( 'setValue', parseInt($('.cashout_jump').text())+parseInt($('.cashout_jumd').text())+parseInt($('.cashout_jumf').text()) );
                $('.cashout_totalp').editable( 'setValue', parseInt($('.cashout_totalp').text())+parseInt($('.cashout_sblumd').text())+parseInt($('.cashout_ssdahd').text())+(parseInt(newValue)-parseInt($('.cashout_sepp').text())) );
                $('#cashout_total').editable( 'setValue', parseInt($('.cashout_totalp').text())+parseInt($('.cashout_totald').text())+parseInt($('.cashout_totalf').text()) );
            }
        });
        $('.cashout_sepd').editable({
            success: function(response, newValue){
                $('#cashout_sep').editable( 'setValue', (parseInt($('#cashout_sep').text())+parseInt($('.cashout_sepf').text())+parseInt($('.cashout_sepp').text()))-(parseInt($('#cashout_sep').text())-parseInt(newValue)) );
                $('.cashout_jumd').editable( 'setValue', parseInt($('.cashout_jumd').text())+parseInt($('.cashout_sblumd').text())+parseInt($('.cashout_ssdahd').text())+(parseInt(newValue)-parseInt($('.cashout_sepd').text())) );
                $('#cashout_jumpdf').editable( 'setValue', parseInt($('.cashout_jump').text())+parseInt($('.cashout_jumd').text())+parseInt($('.cashout_jumf').text()) );
                $('.cashout_totald').editable( 'setValue', parseInt($('.cashout_totald').text())+parseInt($('.cashout_sblumd').text())+parseInt($('.cashout_ssdahd').text())+(parseInt(newValue)-parseInt($('.cashout_sepd').text())) );
                $('#cashout_total').editable( 'setValue', parseInt($('.cashout_totalp').text())+parseInt($('.cashout_totald').text())+parseInt($('.cashout_totalf').text()) );
            }
        });
        $('.cashout_sepf').editable({
            success: function(response, newValue){
                $('#cashout_sep').editable( 'setValue', (parseInt($('#cashout_sep').text())+parseInt($('.cashout_sepd').text())+parseInt($('.cashout_sepp').text()))-(parseInt($('#cashout_sep').text())-parseInt(newValue)) );
                $('.cashout_jumf').editable( 'setValue', parseInt($('.cashout_jumf').text())+parseInt($('.cashout_sblumf').text())+parseInt($('.cashout_ssdahf').text())+(parseInt(newValue)-parseInt($('.cashout_sepf').text())) );
                $('#cashout_jumpdf').editable( 'setValue', parseInt($('.cashout_jump').text())+parseInt($('.cashout_jumd').text())+parseInt($('.cashout_jumf').text()) );
                $('.cashout_totalf').editable( 'setValue', (parseInt($('.cashout_totalf').text())+parseInt($('.cashout_sblumf').text())+parseInt($('.cashout_ssdahf').text()))+(parseInt(newValue)-parseInt($('.cashout_sepf').text())) );
                $('#cashout_total').editable( 'setValue', parseInt($('.cashout_totalp').text())+parseInt($('.cashout_totald').text())+parseInt($('.cashout_totalf').text()) );
            }
        });
        $('.cashout_oktp').editable({
            success: function(response, newValue){
                $('#cashout_okt').editable( 'setValue', (parseInt($('#cashout_okt').text())+parseInt($('.cashout_oktd').text())+parseInt($('.cashout_oktf').text()))-(parseInt($('#cashout_okt').text())-parseInt(newValue)) );
                $('.cashout_jump').editable( 'setValue', parseInt($('.cashout_jump').text())+parseInt($('.cashout_sblump').text())+parseInt($('.cashout_ssdahp').text())+(parseInt(newValue)-parseInt($('.cashout_oktp').text())) );
                $('.cashout_totalp').editable( 'setValue', (parseInt($('.cashout_totalp').text())+parseInt($('.cashout_sblump').text())+parseInt($('.cashout_ssdahp').text()))+(parseInt(newValue)-parseInt($('.cashout_oktp').text())) );
                $('#cashout_jumpdf').editable( 'setValue', parseInt($('.cashout_jump').text())+parseInt($('.cashout_jumd').text())+parseInt($('.cashout_jumf').text()) );
                $('#cashout_total').editable( 'setValue', parseInt($('.cashout_totalp').text())+parseInt($('.cashout_totald').text())+parseInt($('.cashout_totalf').text()) );
            }
        });
        $('.cashout_oktd').editable({
            success: function(response, newValue){
                $('#cashout_okt').editable( 'setValue', (parseInt($('#cashout_okt').text())+parseInt($('.cashout_oktf').text())+parseInt($('.cashout_oktp').text()))-(parseInt($('#cashout_okt').text())-parseInt(newValue)) );
                $('.cashout_jumd').editable( 'setValue', parseInt($('.cashout_jumd').text())+parseInt($('.cashout_sblumd').text())+parseInt($('.cashout_ssdahd').text())+(parseInt(newValue)-parseInt($('.cashout_oktd').text())) );
                $('#cashout_jumpdf').editable( 'setValue', parseInt($('.cashout_jump').text())+parseInt($('.cashout_jumd').text())+parseInt($('.cashout_jumf').text()) );
                $('.cashout_totald').editable( 'setValue', (parseInt($('.cashout_totald').text())+parseInt($('.cashout_sblumd').text())+parseInt($('.cashout_ssdahd').text()))+(parseInt(newValue)-parseInt($('.cashout_oktd').text())) );
                $('#cashout_total').editable( 'setValue', parseInt($('.cashout_totalp').text())+parseInt($('.cashout_totald').text())+parseInt($('.cashout_totalf').text()) );
            }
        });
        $('.cashout_oktf').editable({
            success: function(response, newValue){
                $('#cashout_okt').editable( 'setValue', (parseInt($('#cashout_okt').text())+parseInt($('.cashout_oktd').text())+parseInt($('.cashout_oktp').text()))-(parseInt($('#cashout_okt').text())-parseInt(newValue)) );
                $('.cashout_jumf').editable( 'setValue', parseInt($('.cashout_jumf').text())+parseInt($('.cashout_sblumf').text())+parseInt($('.cashout_ssdahf').text())+(parseInt(newValue)-parseInt($('.cashout_oktf').text())) );
                $('#cashout_jumpdf').editable( 'setValue', parseInt($('.cashout_jump').text())+parseInt($('.cashout_jumd').text())+parseInt($('.cashout_jumf').text()) );
                $('.cashout_totalf').editable( 'setValue', (parseInt($('.cashout_totalf').text())+parseInt($('.cashout_sblumf').text())+parseInt($('.cashout_ssdahf').text()))+(parseInt(newValue)-parseInt($('.cashout_oktf').text())) );
                $('#cashout_total').editable( 'setValue', parseInt($('.cashout_totalp').text())+parseInt($('.cashout_totald').text())+parseInt($('.cashout_totalf').text()) );
            }
        });
        $('.cashout_novp').editable({
            success: function(response, newValue){
                $('#cashout_nov').editable( 'setValue', (parseInt($('#cashout_nov').text())+parseInt($('.cashout_novd').text())+parseInt($('.cashout_novf').text()))-(parseInt($('#cashout_nov').text())-parseInt(newValue)) );
                $('.cashout_jump').editable( 'setValue', parseInt($('.cashout_jump').text())+parseInt($('.cashout_sblump').text())+parseInt($('.cashout_ssdahp').text())+(parseInt(newValue)-parseInt($('.cashout_novp').text())) );
                $('#cashout_jumpdf').editable( 'setValue', parseInt($('.cashout_jump').text())+parseInt($('.cashout_jumd').text())+parseInt($('.cashout_jumf').text()) );
                $('.cashout_totalp').editable( 'setValue', parseInt($('.cashout_totalp').text())+parseInt($('.cashout_sblumd').text())+parseInt($('.cashout_ssdahd').text())+(parseInt(newValue)-parseInt($('.cashout_novp').text())) );
                $('#cashout_total').editable( 'setValue', parseInt($('.cashout_totalp').text())+parseInt($('.cashout_totald').text())+parseInt($('.cashout_totalf').text()) );
            }
        });
        $('.cashout_novd').editable({
            success: function(response, newValue){
                $('#cashout_nov').editable( 'setValue', (parseInt($('#cashout_nov').text())+parseInt($('.cashout_novf').text())+parseInt($('.cashout_novp').text()))-(parseInt($('#cashout_nov').text())-parseInt(newValue)) );
                $('.cashout_jumd').editable( 'setValue', parseInt($('.cashout_jumd').text())+parseInt($('.cashout_sblumd').text())+parseInt($('.cashout_ssdahd').text())+(parseInt(newValue)-parseInt($('.cashout_novd').text())) );
                $('#cashout_jumpdf').editable( 'setValue', parseInt($('.cashout_jump').text())+parseInt($('.cashout_jumd').text())+parseInt($('.cashout_jumf').text()) );
                $('.cashout_totald').editable( 'setValue', parseInt($('.cashout_totald').text())+parseInt($('.cashout_sblumd').text())+parseInt($('.cashout_ssdahd').text())+(parseInt(newValue)-parseInt($('.cashout_novd').text())) );
                $('#cashout_total').editable( 'setValue', parseInt($('.cashout_totalp').text())+parseInt($('.cashout_totald').text())+parseInt($('.cashout_totalf').text()) );
            }
        });
        $('.cashout_novf').editable({
            success: function(response, newValue){
                $('#cashout_nov').editable( 'setValue', (parseInt($('#cashout_nov').text())+parseInt($('.cashout_novd').text())+parseInt($('.cashout_novp').text()))-(parseInt($('#cashout_nov').text())-parseInt(newValue)) );
                $('.cashout_jumf').editable( 'setValue', parseInt($('.cashout_jumf').text())+parseInt($('.cashout_sblumf').text())+parseInt($('.cashout_ssdahf').text())+(parseInt(newValue)-parseInt($('.cashout_desf').text())) );
                $('#cashout_jumpdf').editable( 'setValue', parseInt($('.cashout_jump').text())+parseInt($('.cashout_jumd').text())+parseInt($('.cashout_jumf').text()) );
                $('.cashout_totalf').editable( 'setValue', (parseInt($('.cashout_totalf').text())+parseInt($('.cashout_sblumf').text())+parseInt($('.cashout_ssdahf').text()))+(parseInt(newValue)-parseInt($('.cashout_novf').text())) );
                $('#cashout_total').editable( 'setValue', parseInt($('.cashout_totalp').text())+parseInt($('.cashout_totald').text())+parseInt($('.cashout_totalf').text()) );
            }
        });
        $('.cashout_desp').editable({
            success: function(response, newValue){
                $('#cashout_des').editable( 'setValue', (parseInt($('#cashout_des').text())+parseInt($('.cashout_desd').text())+parseInt($('.cashout_desf').text()))-(parseInt($('#cashout_des').text())-parseInt(newValue)) );
                $('.cashout_jump').editable( 'setValue', parseInt($('.cashout_jump').text())+parseInt($('.cashout_sblump').text())+parseInt($('.cashout_ssdahp').text())+(parseInt(newValue)-parseInt($('.cashout_desp').text())) );
                $('#cashout_jumpdf').editable( 'setValue', parseInt($('.cashout_jump').text())+parseInt($('.cashout_jumd').text())+parseInt($('.cashout_jumf').text()) );
                $('.cashout_totalp').editable( 'setValue', (parseInt($('.cashout_totalp').text())+parseInt($('.cashout_sblump').text())+parseInt($('.cashout_ssdahp').text()))+(parseInt(newValue)-parseInt($('.cashout_desp').text())) );
                $('#cashout_total').editable( 'setValue', parseInt($('.cashout_totalp').text())+parseInt($('.cashout_totald').text())+parseInt($('.cashout_totalf').text()) );
            }
        });
        $('.cashout_desd').editable({
            success: function(response, newValue){
                $('#cashout_des').editable( 'setValue', (parseInt($('#cashout_des').text())+parseInt($('.cashout_desf').text())+parseInt($('.cashout_desp').text()))-(parseInt($('#cashout_des').text())-parseInt(newValue)) );
                $('.cashout_jumd').editable( 'setValue', parseInt($('.cashout_jumd').text())+parseInt($('.cashout_sblumd').text())+parseInt($('.cashout_ssdahd').text())+(parseInt(newValue)-parseInt($('.cashout_desd').text())) );
                $('#cashout_jumpdf').editable( 'setValue', parseInt($('.cashout_jump').text())+parseInt($('.cashout_jumd').text())+parseInt($('.cashout_jumf').text()) );
                $('.cashout_totald').editable( 'setValue', (parseInt($('.cashout_totald').text())+parseInt($('.cashout_sblumd').text())+parseInt($('.cashout_ssdahd').text()))+(parseInt(newValue)-parseInt($('.cashout_desd').text())) );
                $('#cashout_total').editable( 'setValue', parseInt($('.cashout_totalp').text())+parseInt($('.cashout_totald').text())+parseInt($('.cashout_totalf').text()) );
            }
        });
        $('.cashout_desf').editable({
            success: function(response, newValue){
                $('#cashout_des').editable( 'setValue', (parseInt($('#cashout_des').text())+parseInt($('.cashout_desd').text())+parseInt($('.cashout_desp').text()))-(parseInt($('#cashout_des').text())-parseInt(newValue)) );
                $('.cashout_jumf').editable( 'setValue', parseInt($('.cashout_jumf').text())+parseInt($('.cashout_sblumf').text())+parseInt($('.cashout_ssdahf').text())+(parseInt(newValue)-parseInt($('.cashout_desf').text())) );
                $('#cashout_jumpdf').editable( 'setValue', parseInt($('.cashout_jump').text())+parseInt($('.cashout_jumd').text())+parseInt($('.cashout_jumf').text()) );
                $('.cashout_totalf').editable( 'setValue', (parseInt($('.cashout_totalf').text())+parseInt($('.cashout_sblumf').text())+parseInt($('.cashout_ssdahf').text()))+(parseInt(newValue)-parseInt($('.cashout_desf').text())) );
                $('#cashout_total').editable( 'setValue', parseInt($('.cashout_totalp').text())+parseInt($('.cashout_totald').text())+parseInt($('.cashout_totalf').text()) );
            }
        });
        //OMZET
        $('.omzet_jan').editable({
            success: function(response, newValue){
                $('#omzet_jan').editable( 'setValue', parseInt(newValue) );
                $('.omzet_th').editable( 'setValue', parseInt($('.omzet_th').text())+parseInt($('.omzet_sbelum').text())+parseInt($('.omzet_ssdah').text())+(parseInt(newValue)-parseInt($('.omzet_jan').text())) );
                $('#omzet_th').editable( 'setValue', parseInt($('#omzet_th').text())+parseInt($('.omzet_sbelum').text())+parseInt($('.omzet_ssdah').text())+(parseInt(newValue)-parseInt($('.omzet_jan').text())) );
                $('.omzet_total').editable( 'setValue', (parseInt($('.omzet_total').text())+parseInt($('.omzet_sbelum').text())+parseInt($('.omzet_ssdah').text()))+(parseInt(newValue)-parseInt($('.omzet_jan').text())) );
                $('#omzet_total').editable( 'setValue', (parseInt($('#omzet_total').text())+parseInt($('.omzet_sbelum').text())+parseInt($('.omzet_ssdah').text()))+(parseInt(newValue)-parseInt($('.omzet_jan').text())) );
            }
        });
        $('.omzet_feb').editable({
            success: function(response, newValue){
                $('#omzet_feb').editable( 'setValue', parseInt(newValue) );
                $('.omzet_th').editable( 'setValue', parseInt($('.omzet_th').text())+parseInt($('.omzet_sbelum').text())+parseInt($('.omzet_ssdah').text())+(parseInt(newValue)-parseInt($('.omzet_feb').text())) );
                $('#omzet_th').editable( 'setValue', parseInt($('#omzet_th').text())+parseInt($('.omzet_sbelum').text())+parseInt($('.omzet_ssdah').text())+(parseInt(newValue)-parseInt($('.omzet_feb').text())) );
                $('.omzet_total').editable( 'setValue', (parseInt($('.omzet_total').text())+parseInt($('.omzet_sbelum').text())+parseInt($('.omzet_ssdah').text()))+(parseInt(newValue)-parseInt($('.omzet_feb').text())) );
                $('#omzet_total').editable( 'setValue', (parseInt($('#omzet_total').text())+parseInt($('.omzet_sbelum').text())+parseInt($('.omzet_ssdah').text()))+(parseInt(newValue)-parseInt($('.omzet_feb').text())) );
            }
        });
        $('.omzet_mar').editable({
            success: function(response, newValue){
                $('#omzet_mar').editable( 'setValue', parseInt(newValue) );
                $('.omzet_th').editable( 'setValue', parseInt($('.omzet_th').text())+parseInt($('.omzet_sbelum').text())+parseInt($('.omzet_ssdah').text())+(parseInt(newValue)-parseInt($('.omzet_mar').text())) );
                $('#omzet_th').editable( 'setValue', parseInt($('#omzet_th').text())+parseInt($('.omzet_sbelum').text())+parseInt($('.omzet_ssdah').text())+(parseInt(newValue)-parseInt($('.omzet_mar').text())) );
                $('.omzet_total').editable( 'setValue', (parseInt($('.omzet_total').text())+parseInt($('.omzet_sbelum').text())+parseInt($('.omzet_ssdah').text()))+(parseInt(newValue)-parseInt($('.omzet_mar').text())) );
                $('#omzet_total').editable( 'setValue', (parseInt($('#omzet_total').text())+parseInt($('.omzet_sbelum').text())+parseInt($('.omzet_ssdah').text()))+(parseInt(newValue)-parseInt($('.omzet_mar').text())) );
            }
        });
        $('.omzet_apr').editable({
            success: function(response, newValue){
                $('#omzet_apr').editable( 'setValue', parseInt(newValue) );
                $('.omzet_th').editable( 'setValue', parseInt($('.omzet_th').text())+parseInt($('.omzet_sbelum').text())+parseInt($('.omzet_ssdah').text())+(parseInt(newValue)-parseInt($('.omzet_apr').text())) );
                $('#omzet_th').editable( 'setValue', parseInt($('#omzet_th').text())+parseInt($('.omzet_sbelum').text())+parseInt($('.omzet_ssdah').text())+(parseInt(newValue)-parseInt($('.omzet_apr').text())) );
                $('.omzet_total').editable( 'setValue', (parseInt($('.omzet_total').text())+parseInt($('.omzet_sbelum').text())+parseInt($('.omzet_ssdah').text()))+(parseInt(newValue)-parseInt($('.omzet_apr').text())) );
                $('#omzet_total').editable( 'setValue', (parseInt($('#omzet_total').text())+parseInt($('.omzet_sbelum').text())+parseInt($('.omzet_ssdah').text()))+(parseInt(newValue)-parseInt($('.omzet_apr').text())) );
            }
        });
        $('.omzet_mei').editable({
            success: function(response, newValue){
                $('#omzet_mei').editable( 'setValue', parseInt(newValue) );
                $('.omzet_th').editable( 'setValue', parseInt($('.omzet_th').text())+parseInt($('.omzet_sbelum').text())+parseInt($('.omzet_ssdah').text())+(parseInt(newValue)-parseInt($('.omzet_mei').text())) );
                $('#omzet_th').editable( 'setValue', parseInt($('#omzet_th').text())+parseInt($('.omzet_sbelum').text())+parseInt($('.omzet_ssdah').text())+(parseInt(newValue)-parseInt($('.omzet_mei').text())) );
                $('.omzet_total').editable( 'setValue', (parseInt($('.omzet_total').text())+parseInt($('.omzet_sbelum').text())+parseInt($('.omzet_ssdah').text()))+(parseInt(newValue)-parseInt($('.omzet_mei').text())) );
                $('#omzet_total').editable( 'setValue', (parseInt($('#omzet_total').text())+parseInt($('.omzet_sbelum').text())+parseInt($('.omzet_ssdah').text()))+(parseInt(newValue)-parseInt($('.omzet_mei').text())) );
            }
        });
        $('.omzet_jun').editable({
            success: function(response, newValue){
                $('#omzet_jun').editable( 'setValue', parseInt(newValue) );
                $('.omzet_th').editable( 'setValue', parseInt($('.omzet_th').text())+parseInt($('.omzet_sbelum').text())+parseInt($('.omzet_ssdah').text())+(parseInt(newValue)-parseInt($('.omzet_jun').text())) );
                $('#omzet_th').editable( 'setValue', parseInt($('#omzet_th').text())+parseInt($('.omzet_sbelum').text())+parseInt($('.omzet_ssdah').text())+(parseInt(newValue)-parseInt($('.omzet_jun').text())) );
                $('.omzet_total').editable( 'setValue', (parseInt($('.omzet_total').text())+parseInt($('.omzet_sbelum').text())+parseInt($('.omzet_ssdah').text()))+(parseInt(newValue)-parseInt($('.omzet_jun').text())) );
                $('#omzet_total').editable( 'setValue', (parseInt($('#omzet_total').text())+parseInt($('.omzet_sbelum').text())+parseInt($('.omzet_ssdah').text()))+(parseInt(newValue)-parseInt($('.omzet_jun').text())) );
            }
        });
        $('.omzet_jul').editable({
            success: function(response, newValue){
                $('#omzet_jul').editable( 'setValue', parseInt(newValue) );
                $('.omzet_th').editable( 'setValue', parseInt($('.omzet_th').text())+parseInt($('.omzet_sbelum').text())+parseInt($('.omzet_ssdah').text())+(parseInt(newValue)-parseInt($('.omzet_jul').text())) );
                $('#omzet_th').editable( 'setValue', parseInt($('#omzet_th').text())+parseInt($('.omzet_sbelum').text())+parseInt($('.omzet_ssdah').text())+(parseInt(newValue)-parseInt($('.omzet_jul').text())) );
                $('.omzet_total').editable( 'setValue', (parseInt($('.omzet_total').text())+parseInt($('.omzet_sbelum').text())+parseInt($('.omzet_ssdah').text()))+(parseInt(newValue)-parseInt($('.omzet_jul').text())) );
                $('#omzet_total').editable( 'setValue', (parseInt($('#omzet_total').text())+parseInt($('.omzet_sbelum').text())+parseInt($('.omzet_ssdah').text()))+(parseInt(newValue)-parseInt($('.omzet_jul').text())) );
            }
        });
        $('.omzet_agt').editable({
            success: function(response, newValue){
                $('#omzet_agt').editable( 'setValue', parseInt(newValue) );
                $('.omzet_th').editable( 'setValue', parseInt($('.omzet_th').text())+parseInt($('.omzet_sbelum').text())+parseInt($('.omzet_ssdah').text())+(parseInt(newValue)-parseInt($('.omzet_agt').text())) );
                $('#omzet_th').editable( 'setValue', parseInt($('#omzet_th').text())+parseInt($('.omzet_sbelum').text())+parseInt($('.omzet_ssdah').text())+(parseInt(newValue)-parseInt($('.omzet_agt').text())) );
                $('.omzet_total').editable( 'setValue', (parseInt($('.omzet_total').text())+parseInt($('.omzet_sbelum').text())+parseInt($('.omzet_ssdah').text()))+(parseInt(newValue)-parseInt($('.omzet_agt').text())) );
                $('#omzet_total').editable( 'setValue', (parseInt($('#omzet_total').text())+parseInt($('.omzet_sbelum').text())+parseInt($('.omzet_ssdah').text()))+(parseInt(newValue)-parseInt($('.omzet_agt').text())) );
            }
        });
        $('.omzet_sep').editable({
            success: function(response, newValue){
                $('#omzet_sep').editable( 'setValue', parseInt(newValue) );
                $('.omzet_th').editable( 'setValue', parseInt($('.omzet_th').text())+parseInt($('.omzet_sbelum').text())+parseInt($('.omzet_ssdah').text())+(parseInt(newValue)-parseInt($('.omzet_sep').text())) );
                $('#omzet_th').editable( 'setValue', parseInt($('#omzet_th').text())+parseInt($('.omzet_sbelum').text())+parseInt($('.omzet_ssdah').text())+(parseInt(newValue)-parseInt($('.omzet_sep').text())) );
                $('.omzet_total').editable( 'setValue', (parseInt($('.omzet_total').text())+parseInt($('.omzet_sbelum').text())+parseInt($('.omzet_ssdah').text()))+(parseInt(newValue)-parseInt($('.omzet_sep').text())) );
                $('#omzet_total').editable( 'setValue', (parseInt($('#omzet_total').text())+parseInt($('.omzet_sbelum').text())+parseInt($('.omzet_ssdah').text()))+(parseInt(newValue)-parseInt($('.omzet_sep').text())) );
            }
        });
        $('.omzet_okt').editable({
            success: function(response, newValue){
                $('#omzet_okt').editable( 'setValue', parseInt(newValue) );
                $('.omzet_th').editable( 'setValue', parseInt($('.omzet_th').text())+parseInt($('.omzet_sbelum').text())+parseInt($('.omzet_ssdah').text())+(parseInt(newValue)-parseInt($('.omzet_okt').text())) );
                $('#omzet_th').editable( 'setValue', parseInt($('#omzet_th').text())+parseInt($('.omzet_sbelum').text())+parseInt($('.omzet_ssdah').text())+(parseInt(newValue)-parseInt($('.omzet_okt').text())) );
                $('.omzet_total').editable( 'setValue', (parseInt($('.omzet_total').text())+parseInt($('.omzet_sbelum').text())+parseInt($('.omzet_ssdah').text()))+(parseInt(newValue)-parseInt($('.omzet_okt').text())) );
                $('#omzet_total').editable( 'setValue', (parseInt($('#omzet_total').text())+parseInt($('.omzet_sbelum').text())+parseInt($('.omzet_ssdah').text()))+(parseInt(newValue)-parseInt($('.omzet_okt').text())) );
            }
        });
        $('.omzet_nov').editable({
            success: function(response, newValue){
                $('#omzet_nov').editable( 'setValue', parseInt(newValue) );
                $('.omzet_th').editable( 'setValue', parseInt($('.omzet_th').text())+parseInt($('.omzet_sbelum').text())+parseInt($('.omzet_ssdah').text())+(parseInt(newValue)-parseInt($('.omzet_nov').text())) );
                $('#omzet_th').editable( 'setValue', parseInt($('#omzet_th').text())+parseInt($('.omzet_sbelum').text())+parseInt($('.omzet_ssdah').text())+(parseInt(newValue)-parseInt($('.omzet_nov').text())) );
                $('.omzet_total').editable( 'setValue', (parseInt($('.omzet_total').text())+parseInt($('.omzet_sbelum').text())+parseInt($('.omzet_ssdah').text()))+(parseInt(newValue)-parseInt($('.omzet_nov').text())) );
                $('#omzet_total').editable( 'setValue', (parseInt($('#omzet_total').text())+parseInt($('.omzet_sbelum').text())+parseInt($('.omzet_ssdah').text()))+(parseInt(newValue)-parseInt($('.omzet_nov').text())) );
            }
        });
        $('.omzet_des').editable({
            success: function(response, newValue){
                $('#omzet_des').editable( 'setValue', parseInt(newValue) );
                $('.omzet_th').editable( 'setValue', parseInt($('.omzet_th').text())+parseInt($('.omzet_sbelum').text())+parseInt($('.omzet_ssdah').text())+(parseInt(newValue)-parseInt($('.omzet_des').text())) );
                $('#omzet_th').editable( 'setValue', parseInt($('#omzet_th').text())+parseInt($('.omzet_sbelum').text())+parseInt($('.omzet_ssdah').text())+(parseInt(newValue)-parseInt($('.omzet_des').text())) );
                $('.omzet_total').editable( 'setValue', (parseInt($('.omzet_total').text())+parseInt($('.omzet_sbelum').text())+parseInt($('.omzet_ssdah').text()))+(parseInt(newValue)-parseInt($('.omzet_des').text())) );
                $('#omzet_total').editable( 'setValue', (parseInt($('#omzet_total').text())+parseInt($('.omzet_sbelum').text())+parseInt($('.omzet_ssdah').text()))+(parseInt(newValue)-parseInt($('.omzet_des').text())) );
            }
        });
        $('.omzet_proyeksi').editable({
            success: function(response, newValue){
                $('#omzet_proyeksi').editable( 'setValue', parseInt(newValue) );
            }
        });
        $('.omzet').editable();
        //DIVISI
        $('.loandiv_cashin').editable({
            success: function(response, newValue){
                $('#loandiv_cashin').editable( 'setValue', parseInt(newValue) );
            }
        });
        $('.loandiv_cashout').editable();
        $('.loandiv_cashdwi1').editable();
        $('.loandiv_cashdwi2').editable();
        $('.loandiv_konvensional').editable();
        $('.loandiv_bank').editable();
        //
        $('.cashoutddiv').editable();
        $('.cashoutdiv').editable();
        $('.loan').editable();
        
    });
})