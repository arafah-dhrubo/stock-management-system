<style>
    li {
        display: block;
        float: left;
        position: relative;
        transition-duration: 0.5s;
        width: 100%;
    }

    li:focus-within a {
        outline: none;
    }

    ul li ul {
        background: white;
        visibility: hidden;
        opacity: 0;
        width: 10rem;
        position: absolute;
        transition: all 0.5s ease;
        margin-top: 1rem;
        right: 0;
        display: none;
    }

    ul li:hover > ul,
    ul li:focus-within > ul,
    ul li ul:hover,
    ul li ul:focus {
        visibility: visible;
        opacity: 1;
        display: block
    }

    ul li ul li {
        clear: both;
        width: 100%;
    }
</style>
<nav class="navbar navbar-expand-lg navbar-light bg-white">
    <div class="container mx-auto">
        <ul class="flex items-center px-2 py-2">
            <a href="<?php echo base_url() ?>" class="logo text-3xl text-gray-900 font-semibold uppercase"><span
                        class="text-indigo-500">TD</span>Ipsum
            </a>
            <form class="flex mx-auto w-2/4 gap-3">
                <input class="border border-gray-300 rounded px-2 py-1 w-full me-2 focus:outline-none focus:border focus:border-indigo-500">
                <button class="bg-indigo-500 text-white px-3 py-1 rounded" type="submit">Search</button>
            </form>
            <div class="mr-3 relative">
                <a
                        href="<?php echo base_url() . 'home/showCart' ?>"
                        class='text-gray-900'><i class="fas fa-shopping-bag text-3xl"> </i>
                    <?php if ($this->cart->total_items() > 0) { ?>
                        <div class=" absolute top-0 right-0 text-white bg-indigo-400 text-sm rounded-full w-5 h-5 text-center">
                            <?php echo $this->cart->total_items(); ?>
                        </div>
                    <?php } ?>
                </a>

            </div>
            <?php if (isset($_SESSION['user']['username'])){ ?>
            <ul>
                <li>
                    <a href="#"
                       class="hover:text-indigo-400 focus:text-indigo-400 flex items-center"><i
                                class="far fa-user text-2xl"></i> <?php echo $_SESSION['user']['username']; ?></a>
                    <ul class="dropdown">
                        <li>
                            <a href="<?php echo base_url() . 'home/history' ?>"
                               class='text-gray-900 flex items-center px-3 py-1 hover:bg-indigo-50 text-sm'>
                                <i class="far fa-user-circle text-2xl"></i> Profile</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url() . 'home/history' ?>"
                               class='text-gray-90 flex items-center px-3 py-1 hover:bg-indigo-50 text-sm'>
                                <i class="fas fa-history text-2xl"></i> Order history</a>
                        </li>
                        <hr>
                        <li>
                            <a href="<?php echo base_url() . 'accounts/logout' ?>"
                               class='text-gray-900 flex items-center px-3 py-1 hover:bg-indigo-50 text-sm'>
                                <i class="fas fa-sign-out-alt text-2xl"></i> Logout</a>
                        </li>

                        <?php } else { ?>
                            <li><a href="<?php echo base_url() . 'accounts/login' ?>"
                                   class='text-gray-900'>
                                    <i class="fas fa-sign-in-alt text-3xl"></i></a></li>
                        <?php } ?>
                    </ul>
                </li>
            </ul>
    </div>
</nav>

