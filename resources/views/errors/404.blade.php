
<x-header>

  <style>
    *{
    margin:0;
    padding:0;
    box-sizing:border-box;
}
.body{
    font-family: 'Poppins', sans-serif;
    background-color:white;
    min-height:100vh;
    display: flex;
    align-items: center;
    justify-content: center;
}
.wrapper{
    text-align: center;
}
.wrapper h2{
    margin:40px 0;
    font-size:2.5rem;
}
.wrapper img{
    width:600px;
    max-width:75%;
}
.wrapper h4{
    margin:40px 0 20px;
    font-size:1.2rem;
}
.main-btn{
    padding:15px;
    background-color: #6A9758;
    color:#fff;
    border:none;
    font-weight:700;
    letter-spacing: 1px;
    border-radius: 6px;
    cursor: pointer;
}

@media (max-width:767px){
    .wrapper h2{
        font-size:2rem;
    }
    .wrapper h4{
        font-size:1rem;
    }
}

  </style>

<div class="body" >
    <div class="wrapper">
        <h2>Oeps! Pagina niet gevonden.</h2>
        <div>
            <img  src="/storage/images/404.svg" alt="404" />
        </div>
        <a class="main-btn" href="{{ route('customerHome') }}"> Ga Terug</a>

    </div>
</div>
</x-header>
