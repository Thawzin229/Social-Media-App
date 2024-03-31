<template>
    <!-- navigation top-->
    <div class="nav-header bg-white shadow-xs border-0">
        <div class="nav-top">
            <a href="index.html"
                ><i class="feather-zap text-success display1-size me-2 ms-0"></i
                ><span
                    class="d-inline-block fredoka-font ls-3 fw-600 text-current font-xxl logo-text mb-0"
                    >Mikey
                </span>
            </a>
            <a href="#" class="mob-menu ms-auto me-2 chat-active-btn"
                ><i
                    class="feather-message-circle text-grey-900 font-sm btn-round-md bg-greylight"
                ></i
            ></a>
            <a href="default-video.html" class="mob-menu me-2"
                ><i
                    class="feather-video text-grey-900 font-sm btn-round-md bg-greylight"
                ></i
            ></a>
            <a href="#" class="me-2 menu-search-icon mob-menu"
                ><i
                    class="feather-search text-grey-900 font-sm btn-round-md bg-greylight"
                ></i
            ></a>
            <button class="nav-menu me-0 ms-2"></button>
        </div>

        <form action="#" class="float-left header-search">
            <div class="form-group mb-0 icon-input">
                <i class="feather-search font-sm text-grey-400"></i>
                <input
                    v-model="search"
                    type="text"
                    placeholder="Start typing to search.."
                    class="bg-grey border-0 lh-32 pt-2 pb-2 ps-5 pe-3 font-xssss fw-500 rounded-xl w350 theme-dark-bg"
                />
            </div>
        </form>
        <Link href="/" class="p-2 text-center ms-3 menu-icon center-menu-icon"
            ><i
                class="feather-home font-lg alert-primary btn-round-lg theme-dark-bg text-current"
            ></i
        ></Link>
        <Link
            href="/story/page"
            class="p-2 text-center ms-0 menu-icon center-menu-icon"
            ><i
                class="feather-zap font-lg bg-greylight btn-round-lg theme-dark-bg text-grey-500"
            ></i
        ></Link>
        <Link
            href="/user/list"
            class="p-2 text-center ms-0 menu-icon center-menu-icon"
            ><i
                class="feather-user font-lg bg-greylight btn-round-lg theme-dark-bg text-grey-500"
            ></i
        ></Link>

        <Link
            href="/notification"
            class="p-2 text-center ms-auto menu-icon"
            aria-expanded="false"
            ><span class="dot-count bg-warning"></span
            ><i class="feather-bell font-xl text-current"></i
        ></Link>
        <a href="#" class="p-2 text-center ms-3 menu-icon chat-active-btn"
            ><i class="feather-message-square font-xl text-current"></i
        ></a>
        <div
            class="p-2 text-center ms-3 position-relative dropdown-menu-icon menu-icon cursor-pointer"
        >
            <i
                class="feather-settings animation-spin d-inline-block font-xl text-current"
            ></i>
            <div class="dropdown-menu-settings switchcolor-wrap">
                <h4 class="fw-700 font-sm mb-4">Settings</h4>
                <h6 class="font-xssss text-grey-500 fw-700 mb-3 d-block">
                    Choose Color Theme
                </h6>
                <ul>
                    <li>
                        <label class="item-radio item-content">
                            <input
                                type="radio"
                                name="color-radio"
                                value="red"
                                checked=""
                            /><i class="ti-check"></i>
                            <span
                                class="circle-color bg-red"
                                style="background-color: #ff3b30"
                            ></span>
                        </label>
                    </li>
                    <li>
                        <label class="item-radio item-content">
                            <input
                                type="radio"
                                name="color-radio"
                                value="green"
                            /><i class="ti-check"></i>
                            <span
                                class="circle-color bg-green"
                                style="background-color: #4cd964"
                            ></span>
                        </label>
                    </li>
                    <li>
                        <label class="item-radio item-content">
                            <input
                                type="radio"
                                name="color-radio"
                                value="blue"
                                checked=""
                            /><i class="ti-check"></i>
                            <span
                                class="circle-color bg-blue"
                                style="background-color: #132977"
                            ></span>
                        </label>
                    </li>
                    <li>
                        <label class="item-radio item-content">
                            <input
                                type="radio"
                                name="color-radio"
                                value="pink"
                            /><i class="ti-check"></i>
                            <span
                                class="circle-color bg-pink"
                                style="background-color: #ff2d55"
                            ></span>
                        </label>
                    </li>
                    <li>
                        <label class="item-radio item-content">
                            <input
                                type="radio"
                                name="color-radio"
                                value="yellow"
                            /><i class="ti-check"></i>
                            <span
                                class="circle-color bg-yellow"
                                style="background-color: #ffcc00"
                            ></span>
                        </label>
                    </li>
                    <li>
                        <label class="item-radio item-content">
                            <input
                                type="radio"
                                name="color-radio"
                                value="orange"
                            /><i class="ti-check"></i>
                            <span
                                class="circle-color bg-orange"
                                style="background-color: #ff9500"
                            ></span>
                        </label>
                    </li>
                    <li>
                        <label class="item-radio item-content">
                            <input
                                type="radio"
                                name="color-radio"
                                value="gray"
                            /><i class="ti-check"></i>
                            <span
                                class="circle-color bg-gray"
                                style="background-color: #8e8e93"
                            ></span>
                        </label>
                    </li>

                    <li>
                        <label class="item-radio item-content">
                            <input
                                type="radio"
                                name="color-radio"
                                value="brown"
                            /><i class="ti-check"></i>
                            <span
                                class="circle-color bg-brown"
                                style="background-color: #d2691e"
                            ></span>
                        </label>
                    </li>
                    <li>
                        <label class="item-radio item-content">
                            <input
                                type="radio"
                                name="color-radio"
                                value="darkgreen"
                            /><i class="ti-check"></i>
                            <span
                                class="circle-color bg-darkgreen"
                                style="background-color: #228b22"
                            ></span>
                        </label>
                    </li>
                    <li>
                        <label class="item-radio item-content">
                            <input
                                type="radio"
                                name="color-radio"
                                value="deeppink"
                            /><i class="ti-check"></i>
                            <span
                                class="circle-color bg-deeppink"
                                style="background-color: #ffc0cb"
                            ></span>
                        </label>
                    </li>
                    <li>
                        <label class="item-radio item-content">
                            <input
                                type="radio"
                                name="color-radio"
                                value="cadetblue"
                            /><i class="ti-check"></i>
                            <span
                                class="circle-color bg-cadetblue"
                                style="background-color: #5f9ea0"
                            ></span>
                        </label>
                    </li>
                    <li>
                        <label class="item-radio item-content">
                            <input
                                type="radio"
                                name="color-radio"
                                value="darkorchid"
                            /><i class="ti-check"></i>
                            <span
                                class="circle-color bg-darkorchid"
                                style="background-color: #9932cc"
                            ></span>
                        </label>
                    </li>
                </ul>

                <div class="card bg-transparent-card border-0 d-block mt-3">
                    <h4 class="d-inline font-xssss mont-font fw-700">
                        Header Background
                    </h4>
                    <div class="d-inline float-right mt-1">
                        <label class="toggle toggle-menu-color"
                            ><input type="checkbox" /><span
                                class="toggle-icon"
                            ></span
                        ></label>
                    </div>
                </div>
                <div class="card bg-transparent-card border-0 d-block mt-3">
                    <h4 class="d-inline font-xssss mont-font fw-700">
                        Menu Position
                    </h4>
                    <div class="d-inline float-right mt-1">
                        <label class="toggle toggle-menu"
                            ><input type="checkbox" /><span
                                class="toggle-icon"
                            ></span
                        ></label>
                    </div>
                </div>
                <div class="card bg-transparent-card border-0 d-block mt-3">
                    <h4 class="d-inline font-xssss mont-font fw-700">
                        Dark Mode
                    </h4>
                    <div class="d-inline float-right mt-1">
                        <label class="toggle toggle-dark"
                            ><input type="checkbox" /><span
                                class="toggle-icon"
                            ></span
                        ></label>
                    </div>
                </div>
            </div>
        </div>

        <Link href="/setting" class="text-dark p-0 ms-3 menu-icon"
            ><img
                v-if="$page.props.data_user.image"
                style="width: 50px; height: 40px"
                :src="
                    'http://127.0.0.1:8000/storage/' +
                    $page.props.data_user.image
                "
                class="w40 mt--1" />
            <img
                v-if="!$page.props.data_user.image"
                style="width: 50px; height: 40px"
                src="https://img.freepik.com/free-vector/businessman-character-avatar-isolated_24877-60111.jpg?size=626&ext=jpg&ga=GA1.1.1466268726.1691048354&semt=ais"
                class="w40 mt--1"
        /></Link>
    </div>
    <!-- navigation top -->

    <!-- navigation left -->
    <nav class="navigation scroll-bar">
        <div class="container ps-0 pe-0">
            <div class="nav-content">
                <div
                    class="nav-wrap bg-white bg-transparent-card rounded-xxl shadow-xss pt-3 pb-1 mb-2 mt-2"
                >
                    <div class="nav-caption fw-600 font-xssss text-grey-500">
                        <span>New </span>Feeds
                    </div>
                    <ul class="mb-1 top-content">
                        <li class="logo d-none d-xl-block d-lg-block"></li>
                        <li>
                            <Link href="/" class="nav-content-bttn open-font"
                                ><i
                                    class="feather-tv btn-round-md bg-blue-gradiant me-3"
                                ></i
                                ><span>Newsfeed</span></Link
                            >
                        </li>
                        <li>
                            <Link
                                href="default-badge.html"
                                class="nav-content-bttn open-font"
                                ><i
                                    class="feather-award btn-round-md bg-red-gradiant me-3"
                                ></i
                                ><span>Badges</span></Link
                            >
                        </li>
                        <li>
                            <Link
                                href="/story/page"
                                class="nav-content-bttn open-font"
                                ><i
                                    class="feather-globe btn-round-md bg-gold-gradiant me-3"
                                ></i
                                ><span>Explore Stories</span></Link
                            >
                        </li>
                        <li>
                            <Link
                                href="/user/list"
                                class="nav-content-bttn open-font"
                                ><i
                                    class="feather-zap btn-round-md bg-mini-gradiant me-3"
                                ></i
                                ><span>users</span></Link
                            >
                        </li>
                        <li>
                            <Link
                                :href="
                                    '/user/profile/' + $page.props.data_user.id
                                "
                                class="nav-content-bttn open-font"
                                ><i
                                    class="feather-user btn-round-md bg-primary-gradiant me-3"
                                ></i
                                ><span>Author Profile </span></Link
                            >
                        </li>
                    </ul>
                </div>

                <div
                    class="nav-wrap bg-white bg-transparent-card rounded-xxl shadow-xss pt-3 pb-1"
                >
                    <div class="nav-caption fw-600 font-xssss text-grey-500">
                        <span></span> Account
                    </div>
                    <ul class="mb-1">
                        <li class="logo d-none d-xl-block d-lg-block"></li>
                        <li>
                            <Link
                                href="/setting"
                                class="nav-content-bttn open-font h-auto pt-2 pb-2"
                                ><i
                                    class="font-sm feather-settings me-3 text-grey-500"
                                ></i
                                ><span>Settings</span></Link
                            >
                        </li>
                        <li>
                            <Link
                                class="nav-content-bttn open-font h-auto pt-2 pb-2"
                                href="/logout"
                                method="post"
                                >Logout</Link
                            >
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- navigation left -->
</template>

<script>
export default {
    data: () => ({
        search: "",
    }),
    watch: {
        search: function (val) {
            this.$inertia.get(
                "/",
                { search: val },
                { preserveState: true, replace: true }
            );
        },
    },
};
</script>

<style></style>
