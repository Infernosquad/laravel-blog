$(function(){
   $('.delete-comment').on('click',function(){
       $(this).closest('form').submit();
   });
});