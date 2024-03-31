<template>
    <div class="main-wrapper">
        <Nav></Nav>
        <div class="main-content right-chat-active">
            <div class="middle-sidebar-bottom">
                <div class="middle-sidebar-left">
                    <!-- loader wrapper -->
                    <div class="preloader-wrap p-3">
                        <div class="box shimmer">
                            <div class="lines">
                                <div class="line s_shimmer"></div>
                                <div class="line s_shimmer"></div>
                                <div class="line s_shimmer"></div>
                                <div class="line s_shimmer"></div>
                            </div>
                        </div>
                        <div class="box shimmer mb-3">
                            <div class="lines">
                                <div class="line s_shimmer"></div>
                                <div class="line s_shimmer"></div>
                                <div class="line s_shimmer"></div>
                                <div class="line s_shimmer"></div>
                            </div>
                        </div>
                        <div class="box shimmer">
                            <div class="lines">
                                <div class="line s_shimmer"></div>
                                <div class="line s_shimmer"></div>
                                <div class="line s_shimmer"></div>
                                <div class="line s_shimmer"></div>
                            </div>
                        </div>
                    </div>
                    <!-- loader wrapper -->
                    <div class="row feed-body">
                        <div class="col-xl-9 col-xxl-9 col-lg-8">
                            <div
                                class="card w-100 shadow-none bg-transparent bg-transparent-card border-0 p-0 mb-0"
                            >
                                <div
                                    class="owl-carousel category-card owl-theme overflow-hidden nav-none"
                                >
                                    <div class="item">
                                        <div
                                            data-bs-toggle="modal"
                                            data-bs-target="#Modalstory"
                                            class="card w125 h200 d-block border-0 shadow-none rounded-xxxl bg-dark overflow-hidden mb-3 mt-3"
                                        >
                                            <div
                                                class="card-body d-block p-3 w-100 position-absolute bottom-0 ms-4 bottomdescription-center"
                                            >
                                                <a href="#" class="">
                                                    <span
                                                        class="btn-round-lg bg-white"
                                                        ><i
                                                            class="feather-plus font-lg"
                                                        ></i
                                                    ></span>
                                                    <div class="clearfix"></div>
                                                    <h4
                                                        class="fw-700 position-relative z-index-1 ls-1 font-xssss text-white mt-2 mb-1"
                                                    >
                                                        Add Story
                                                    </h4>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="item"
                                        v-for="(item, index) in stories.data"
                                        :key="index"
                                    >
                                        <div
                                            data-bs-target="#Modalstory"
                                            class="card w125 h200 d-block border-0 shadow-xss rounded-xxxl bg-gradiant-bottom overflow-hidden cursor-pointer mb-3 mt-3"
                                        >
                                            <img
                                                v-if="item.image"
                                                style="height: 100%"
                                                :src="
                                                    'http://127.0.0.1:8000/storage/' +
                                                    item.image
                                                "
                                                alt=""
                                            />
                                            <img
                                                v-if="!item.image"
                                                style="height: 100%"
                                                src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTankSsu2BpytPCD6rW9fepjX_hbXKn8zOYHA&s"
                                                alt=""
                                            />
                                            <div
                                                class="card-body d-block p-3 w-100 position-absolute bottom-0 text-center"
                                            >
                                                <a href="#">
                                                    <figure
                                                        class="avatar ms-auto me-auto mb-0 position-relative w50 z-index-1"
                                                    >
                                                        <img
                                                            v-if="
                                                                item.user_image
                                                            "
                                                            :src="
                                                                'http://127.0.0.1:8000/storage/' +
                                                                item.user_image
                                                            "
                                                            alt="image"
                                                            style="
                                                                width: 50px;
                                                                height: 50px;
                                                                border-radius: 100%;
                                                            "
                                                            class="float-right p-0 bg-white shadow-xss"
                                                        />
                                                        <img
                                                            v-if="
                                                                !item.user_image
                                                            "
                                                            src=" https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTankSsu2BpytPCD6rW9fepjX_hbXKn8zOYHA&s"
                                                            alt="image"
                                                            style="
                                                                width: 50px;
                                                                height: 50px;
                                                                border-radius: 100%;
                                                            "
                                                            class="float-right p-0 bg-white shadow-xss"
                                                        />
                                                    </figure>
                                                    <div class="clearfix"></div>
                                                    <h4
                                                        class="fw-600 position-relative z-index-1 ls-1 font-xssss text-white mt-2 mb-1"
                                                    >
                                                        {{ item.user_name }}
                                                    </h4>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div
                                class="card w-100 shadow-xss rounded-xxl border-0 ps-4 pt-4 pe-4 pb-3 mb-3"
                            >
                                <div class="card-body p-0">
                                    <div
                                        @click="create()"
                                        class="font-xssss fw-600 text-grey-500 card-body p-0 d-flex align-items-center"
                                    >
                                        <i
                                            class="btn-round-sm font-xs text-primary feather-edit-3 me-2 bg-greylight"
                                        ></i
                                        >Create Post
                                    </div>
                                </div>
                                <div
                                    class="card-body p-0 mt-3 position-relative"
                                >
                                    <figure
                                        class="avatar position-absolute ms-2 mt-1 top-5"
                                    >
                                        <img
                                            style="
                                                width: 30px;
                                                height: 30px;
                                                border-radius: 10%;
                                            "
                                            :src="
                                                'http://127.0.0.1:8000/storage/' +
                                                $page.props.data_user.image
                                            "
                                            alt="image"
                                            class="shadow-sm rounded-circle mt-1"
                                        />
                                    </figure>
                                    <textarea
                                        v-model="post.description"
                                        name="message"
                                        class="h100 bor-0 w-100 rounded-xxl pt-3 ps-5 font-xssss text-grey-500 fw-500 border-light-md theme-dark-bg"
                                        cols="30"
                                        rows="10"
                                        placeholder="   What's on your mind?"
                                    ></textarea>
                                </div>
                                <div class="card-body d-flex p-0">
                                    <a
                                        href="#"
                                        class="d-flex align-items-center font-xssss fw-600 ls-1 text-grey-700 text-dark pe-4"
                                        ><i
                                            class="font-md text-danger feather-video me-2"
                                        ></i
                                        ><span class="d-none-xs"
                                            >Live Video</span
                                        ></a
                                    >
                                    <input
                                        @change="uploadimg"
                                        type="file"
                                        class="d-flex align-items-center mt-2 ms-5 font-xssss fw-600 ls-1 text-grey-700 text-dark pe-4"
                                    />
                                    <a
                                        href="#"
                                        class="d-flex align-items-center font-xssss fw-600 ls-1 text-grey-700 text-dark pe-4"
                                        ><i
                                            class="font-md text-warning feather-camera me-2"
                                        ></i
                                        ><span class="d-none-xs"
                                            >Feeling/Activity</span
                                        ></a
                                    >
                                </div>
                            </div>

                            <div
                                v-for="(post, index) in posts.data"
                                :key="index"
                                class="card w-100 shadow-xss rounded-xxl border-0 p-4 mb-3"
                            >
                                <div class="card-body p-0 d-flex">
                                    <figure class="avatar me-3">
                                        <img
                                            v-if="!post.user_image"
                                            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTankSsu2BpytPCD6rW9fepjX_hbXKn8zOYHA&s"
                                            alt="image"
                                            class="shadow-sm rounded-circle"
                                            style="width: 30px; height: 30px"
                                        />
                                        <img
                                            v-if="post.user_image"
                                            :src="
                                                'http://127.0.0.1:8000/storage/' +
                                                post.user_image
                                            "
                                            alt="image"
                                            class="shadow-sm rounded-circle"
                                            style="width: 30px; height: 30px"
                                        />
                                    </figure>
                                    <h4
                                        class="fw-700 text-grey-900 font-xssss mt-1"
                                    >
                                        <Link
                                            :href="
                                                '/user/profile/' + post.user_id
                                            "
                                            >{{ post.user_name }}</Link
                                        ><span
                                            class="d-block font-xssss fw-500 mt-1 lh-3 text-grey-500"
                                            >{{ post.date }}</span
                                        >
                                    </h4>
                                    <a
                                        href="#"
                                        class="ms-auto"
                                        id="dropdownMenu2"
                                        data-bs-toggle="dropdown"
                                        aria-expanded="false"
                                        ><i
                                            class="ti-more-alt text-grey-900 btn-round-md bg-greylight font-xss"
                                        ></i
                                    ></a>
                                    <div
                                        class="dropdown-menu dropdown-menu-end p-4 rounded-xxl border-0 shadow-lg"
                                        aria-labelledby="dropdownMenu2"
                                    >
                                        <div class="card-body p-0 d-flex">
                                            <i
                                                class="feather-bookmark text-grey-500 me-3 font-lg"
                                            ></i>
                                            <h4
                                                class="fw-600 text-grey-900 font-xssss mt-0 me-4"
                                            >
                                                Save Link
                                                <span
                                                    class="d-block font-xsssss fw-500 mt-1 lh-3 text-grey-500"
                                                    >Add this to your saved
                                                    items</span
                                                >
                                            </h4>
                                        </div>
                                        <div
                                            v-if="
                                                post.user_id ==
                                                $page.props.data_user.id
                                            "
                                            class="card-body p-0 d-flex mt-2"
                                        >
                                            <i
                                                class="feather-alert-circle text-grey-500 me-3 font-lg"
                                            ></i>
                                            <h4
                                                class="fw-600 text-grey-900 font-xssss mt-0 me-4"
                                            >
                                                <Link
                                                    :href="
                                                        '/user/profile/edit/' +
                                                        post.id
                                                    "
                                                    >Edit Post</Link
                                                >
                                                <span
                                                    class="d-block font-xsssss fw-500 mt-1 lh-3 text-grey-500"
                                                    >Save to your saved
                                                    items</span
                                                >
                                            </h4>
                                        </div>
                                        <div class="card-body p-0 d-flex mt-2">
                                            <i
                                                class="feather-alert-octagon text-grey-500 me-3 font-lg"
                                            ></i>
                                            <h4
                                                class="fw-600 text-grey-900 font-xssss mt-0 me-4"
                                            >
                                                Hide all from Group
                                                <span
                                                    class="d-block font-xsssss fw-500 mt-1 lh-3 text-grey-500"
                                                    >Save to your saved
                                                    items</span
                                                >
                                            </h4>
                                        </div>
                                        <div class="card-body p-0 d-flex mt-2">
                                            <i
                                                class="feather-lock text-grey-500 me-3 font-lg"
                                            ></i>
                                            <h4
                                                class="fw-600 mb-0 text-grey-900 font-xssss mt-0 me-4"
                                            >
                                                Unfollow Group
                                                <span
                                                    class="d-block font-xsssss fw-500 mt-1 lh-3 text-grey-500"
                                                    >Save to your saved
                                                    items</span
                                                >
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body p-0 me-lg-5">
                                    <p
                                        class="fw-500 text-grey-500 lh-26 font-xssss w-100"
                                    >
                                        {{ post.description }}
                                    </p>
                                </div>
                                <div class="card-body d-block p-0">
                                    <div class="row ps-2 pe-2">
                                        <div
                                            v-if="post.image"
                                            class="col-lg-12 col-sm-4 p-1"
                                        >
                                            <a href=""
                                                ><img
                                                    :src="
                                                        'http://127.0.0.1:8000/storage/' +
                                                        post.image
                                                    "
                                                    alt="image"
                                            /></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body d-flex p-0 mt-3">
                                    <div
                                        class="emoji-bttn d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss me-2"
                                    >
                                        <i
                                            @click="like(post.id, post.user_id)"
                                            class="feather-heart text-white bg-red-gradiant me-2 btn-round-xs font-xss"
                                        ></i>
                                        <span
                                            v-for="(like, index) in likes"
                                            :key="index"
                                            ><strong
                                                v-if="like.post_id == post.id"
                                                class="me-1"
                                                >{{ like.count }}</strong
                                            ></span
                                        >
                                        Likes
                                    </div>
                                    <Link
                                        :href="'/comment/' + post.id"
                                        class="d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss"
                                        ><i
                                            class="feather-message-circle text-dark text-grey-900 btn-round-sm font-lg"
                                        ></i
                                        ><span class="d-none-xss"
                                            ><span
                                                v-for="(com, index) in comments"
                                                :key="index"
                                                ><strong
                                                    v-if="
                                                        com.post_id == post.id
                                                    "
                                                    class="me-1"
                                                    >{{ com.count }}</strong
                                                ></span
                                            >
                                            Comment</span
                                        ></Link
                                    >
                                    <a
                                        href="#"
                                        id="dropdownMenu21"
                                        data-bs-toggle="dropdown"
                                        aria-expanded="false"
                                        class="ms-auto d-flex align-items-center fw-600 text-grey-900 text-dark lh-26 font-xssss"
                                        ><i
                                            class="feather-share-2 text-grey-900 text-dark btn-round-sm font-lg"
                                        ></i
                                        ><span class="d-none-xs">Share</span></a
                                    >
                                    <div
                                        class="dropdown-menu dropdown-menu-end p-4 rounded-xxl border-0 shadow-lg"
                                        aria-labelledby="dropdownMenu21"
                                    >
                                        <h4
                                            class="fw-700 font-xss text-grey-900 d-flex align-items-center"
                                        >
                                            Share
                                            <i
                                                class="feather-x ms-auto font-xssss btn-round-xs bg-greylight text-grey-900 me-2"
                                            ></i>
                                        </h4>
                                        <div class="card-body p-0 d-flex">
                                            <ul
                                                class="d-flex align-items-center justify-content-between mt-2"
                                            >
                                                <li class="me-1">
                                                    <a
                                                        href="#"
                                                        class="btn-round-lg bg-facebook"
                                                        ><i
                                                            class="font-xs ti-facebook text-white"
                                                        ></i
                                                    ></a>
                                                </li>
                                                <li class="me-1">
                                                    <a
                                                        href="#"
                                                        class="btn-round-lg bg-twiiter"
                                                        ><i
                                                            class="font-xs ti-twitter-alt text-white"
                                                        ></i
                                                    ></a>
                                                </li>
                                                <li class="me-1">
                                                    <a
                                                        href="#"
                                                        class="btn-round-lg bg-linkedin"
                                                        ><i
                                                            class="font-xs ti-linkedin text-white"
                                                        ></i
                                                    ></a>
                                                </li>
                                                <li class="me-1">
                                                    <a
                                                        href="#"
                                                        class="btn-round-lg bg-instagram"
                                                        ><i
                                                            class="font-xs ti-instagram text-white"
                                                        ></i
                                                    ></a>
                                                </li>
                                                <li>
                                                    <a
                                                        href="#"
                                                        class="btn-round-lg bg-pinterest"
                                                        ><i
                                                            class="font-xs ti-pinterest text-white"
                                                        ></i
                                                    ></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="card-body p-0 d-flex">
                                            <ul
                                                class="d-flex align-items-center justify-content-between mt-2"
                                            >
                                                <li class="me-1">
                                                    <a
                                                        href="#"
                                                        class="btn-round-lg bg-tumblr"
                                                        ><i
                                                            class="font-xs ti-tumblr text-white"
                                                        ></i
                                                    ></a>
                                                </li>
                                                <li class="me-1">
                                                    <a
                                                        href="#"
                                                        class="btn-round-lg bg-youtube"
                                                        ><i
                                                            class="font-xs ti-youtube text-white"
                                                        ></i
                                                    ></a>
                                                </li>
                                                <li class="me-1">
                                                    <a
                                                        href="#"
                                                        class="btn-round-lg bg-flicker"
                                                        ><i
                                                            class="font-xs ti-flickr text-white"
                                                        ></i
                                                    ></a>
                                                </li>
                                                <li class="me-1">
                                                    <a
                                                        href="#"
                                                        class="btn-round-lg bg-black"
                                                        ><i
                                                            class="font-xs ti-vimeo-alt text-white"
                                                        ></i
                                                    ></a>
                                                </li>
                                                <li>
                                                    <a
                                                        href="#"
                                                        class="btn-round-lg bg-whatsup"
                                                        ><i
                                                            class="font-xs feather-phone text-white"
                                                        ></i
                                                    ></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <h4
                                            class="fw-700 font-xssss mt-4 text-grey-500 d-flex align-items-center mb-3"
                                        >
                                            Copy Link
                                        </h4>
                                        <i
                                            class="feather-copy position-absolute right-35 mt-3 font-xs text-grey-500"
                                        ></i>
                                        <input
                                            type="text"
                                            value="https://socia.be/1rGxjoJKVF0"
                                            class="bg-grey text-grey-500 font-xssss border-0 lh-32 p-2 font-xssss fw-600 rounded-3 w-100 theme-dark-bg"
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <Chat :user_list="user_list"></Chat>
    </div>
    <Footer></Footer>
</template>

<script>
import Nav from "../layout/Nav.vue";
import Footer from "../layout/Footer.vue";
import Chat from "../layout/Chat.vue";
export default {
    props: {
        user_list: Object,
        notifications: Array,
        posts: Object,
        likes: Array,
        comments: Array,
        stories: Object,
    },
    components: { Nav, Footer, Chat },
    data: () => ({
        post: { description: "", image: "" },
    }),
    methods: {
        uploadimg(e) {
            this.post.image = e.target.files[0];
        },
        create() {
            console.log(this.post);
            this.$inertia.post("/post/create", this.post);
        },
        like(id, post_user_id) {
            this.$inertia.post("/like", {
                post_id: id,
                user_id: this.$page.props.data_user.id,
                post_user_id: post_user_id,
            });
        },
    },
};
</script>

<style></style>
