$(function() {
  $('form').validate({
    // 検証ルール設定
    rules: {
      name: {
        required: true,
        rangelength:[2,20]
      },
      furigana: {
        required: true,
        rangelength:[2,20]
      },
      postal_code: {
        required: true,
        rangelength:[7,8],
        digits:true
      },
      prefecture: {
        required: true
      },
      address: {
        required: true,
        minlength:2
      },
      mail: {
        email:true
      },
      phone: {
        required: true,
        rangelength:[10,11],
        digits:true
      },
    },
    // エラーメッセージ設定
    messages: {
      name: {
        required: '※名前を入力してください',
        rangelength:'※2文字以上20文字未満で入力してください'
      },
      furigana: {
        required: '※ふりがなを入力してください',
        rangelength:'※2文字以上20文字未満で入力してください'
      },
      postal_code: {
        required: '※郵便番号を入力してください',
        rangelength:'※ハイフンなしで入力してください',
        digits:'※ハイフンなしで入力してください',
      },
      prefecture: {
        required: '※都道府県を入力してください'
      },
      address: {
        required: '※市区町村を入力してください'
      },
      mail: {
        email: '※メール形式で入力してください'
      },
      phone: {
        required: '※電話番号を入力してください',
        rangelength:'※ハイフンなしで入力してください',
        digits:'※ハイフンなしで入力してください'
      },
    },
    // エラーメッセージ出力箇所設定
    errorPlacement: function(error, element) {
      if (element.attr("name") == "name") {
        error.insertAfter(".name_error");
      } else if (element.attr("name") == "furigana") {
        error.insertAfter(".furigana_error");
      } else if (element.attr("name") == "postal_code") {
        error.insertAfter(".postal_code_error");
      } else if (element.attr("name") == "prefecture") {
        error.insertAfter(".prefecture_error");
      } else if (element.attr("name") == "address") {
        error.insertAfter(".address_error");
      } else if (element.attr("name") == "mail") {
        error.insertAfter(".mail_error");
      } else if (element.attr("name") == "phone") {
        error.insertAfter(".phone_error");
      } else
        error.insertAfter(element);
    }
  });
});
