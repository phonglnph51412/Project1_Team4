<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="http://localhost/Duan1/Project1_Team4/assets/css/more/about_us.css">
</head>

<body>
    <div class="container">
        <div class="header">
            <h2>Prime</h2>
            <h1>
                About us
            </h1>
        </div>
        <div class="content">
            <ul>
                <li>
                    Website bán giày Prime mang đến cho bạn những đôi giày thời trang, hiện đại và chất lượng hàng đầu. Với phương châm "Chất lượng định hình phong cách", Prime không chỉ tập trung vào thiết kế mà còn chú trọng đến sự thoải mái và độ bền của từng sản phẩm.
                </li>
                <li>
                    Mỗi đôi giày đều được gia công tỉ mỉ từ những chất liệu cao cấp, giúp nâng tầm phong cách và độ bền của bạn cho từng bước đi mỗi ngày dài.
                </li>
                <li>
                    Tại Prime, chúng tôi hiểu rằng mỗi bước đi đều là một câu chuyện. Chính vì vậy, chúng tôi cam kết mang đến những sản phẩm đa dạng từ giày thể thao năng động, giày công sở lịch lãm đến giày casual thoải mái, phù hợp với mọi phong cách và nhu cầu sử dụng.
                </li>
                <li>
                    Hãy cùng Prime tự tin bước đi và khẳng định cá tính của chính mình!
                </li>
            </ul>
        </div>
        <div class="comments-section">
            <h2>
                5 comment
            </h2>
            <div class="sort-by">
                <label for="sort">
                    Sort by:
                </label>
                <select id="sort">
                    <option value="oldest">
                        Oldest
                    </option>
                    <option value="newest">
                        Newest
                    </option>
                </select>
            </div>
            <div class="comment">
                <img alt="User avatar" height="40" src="https://storage.googleapis.com/a1aa/image/IM1bY68lAzbiNxpalr7i6umyCANWeZr5CfZKgAr1lAeem7JPB.jpg" width="40" />
                <div class="comment-text">
                    Add a comment...
                </div>
            </div>
            <div class="add-comment">
                <input placeholder="Add a comment..." type="text" />
                <button type="button">
                    Post
                </button>
            </div>
        </div>
       
            <?php require_once '../layout/footer.php' ?>
        </div>
    </div>
</body>

</html>