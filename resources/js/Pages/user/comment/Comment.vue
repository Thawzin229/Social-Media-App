<template>
    <div
        id="lightboxOverlay"
        tabindex="-1"
        class="lightboxOverlay"
    ></div>
    <div id="commentsection" tabindex="" class="d-flex justify-center">
        <div class="col-7  right-comment chat-left scroll-bar theme-dark-bg">
            <div class="card-body ps-2 pe-4 pb-0 d-flex justify-content-between">

            
                <div class="d-flex">
                  <figure class="avatar me-3">
                    <img
                        :src="'http://127.0.0.1:8000/storage/'+post.user_image"
                        alt="image"
                        class="shadow-sm "
                        style="width: 50px;height: 50px;border-radius: 100%;"
                    />
                </figure>
                <h4 class="fw-700 text-grey-900 font-xssss mt-1 text-left">
                    {{ post.user_name }}
                    <span
                        class="d-block font-xssss fw-500 mt-1 lh-3 text-grey-500"
                        >2 hour ago</span
                    >
                </h4>

              </div>
              <Link href="/" class="d-inline-block mt-2"><i class="ti-arrow-left font-sm text-dark"></i></Link>

                
                
              </div>
                  <p class="text-muted ms-4 my-4">{{ post.description }}</p>
                  <div class="card-body d-block p-0">
                                    <div class="row ps-2 pe-2">
                                        <div v-if="post.image" class="col-lg-12 col-sm-4 p-1 rounded"><a href="" ><img :src="'http://127.0.0.1:8000/storage/'+post.image"  style="width:500px;" alt="image"></a></div>
                                    </div>
                                </div>
            <div class="card-body d-flex ps-2 pe-4 pt-0 mt-0">
                <a
                    href="#"
                    class="d-flex align-items-center fw-600 text-grey-900 lh-26 font-xssss me-3 text-dark"
                    >
                    <i
                        @click="likeBtn(post.id,post.user_id)" class="feather-heart text-white bg-red-gradiant me-2 btn-round-xs font-xss"
                    ></i
                    >{{ like }} Like</a
                >
                <a
                    href="#"
                    class="d-flex align-items-center fw-600 text-grey-900 lh-26 font-xssss text-dark"
                    ><i
                        class="feather-message-circle text-grey-900 btn-round-sm font-lg text-dark"
                    ></i
                    >{{ com_count }} Comment</a
                >
            </div>
            <div class="card w-100 border-0 p-5 shadow-none right-scroll-bar">
              <!-- conment -->
              <div class="d-flex">
                  <textarea placeholder="Write a comment..." v-model="commentText" class="p-3 form-control" name="" id="" cols="30" rows="3"></textarea>
                <button @click="comment()" class="bg-primary ms-4 text-light text-center px-2 rounded" style="height: 50px;">Comment</button>
              </div>
              <!-- comment end -->
                <div v-for="(comment,index) in comments.data" :key="index" class="card-body border-top-xs pt-4 pb-3 pe-4 d-block ps-5">
                    <figure class="avatar position-absolute left-0 ms-2 mt-1">
                        <img
                            :src="'http://127.0.0.1:8000/storage/'+comment.user_image"
                            alt="image"
                            class="shadow-sm"
                            style="width: 50px;height: 50px;border-radius: 100%;"
                        />
                    </figure>
                    <div
                        class="chat p-3 bg-greylight rounded-xxl d-block text-left theme-dark-bg"
                    >
                        <h4 class="fw-700 text-grey-900 font-xssss mt-0 mb-1">
                            {{ comment.user_name }}
                            <a href="#" class="ms-auto"
                                ><i
                                    class="ti-more-alt float-right text-grey-800 font-xsss"
                                ></i
                            ></a>
                        </h4>
                        <p class="fw-500 text-grey-500 lh-20 font-xssss w-100 mt-2 mb-0">
                          {{ comment.comment }}
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
export default {
  props:{post:Object,like:Number,comments:Object,com_count:Number},
  data:()=>({
    commentText:"",
  }),
  methods:{
    comment()
    {
      const  post = {'comment':this.commentText,'user_id':this.$page.props.data_user.id,'post_id':this.post.id}
      this.$inertia.post('/comment/create',post);
      this.commentText = "";
    },
    likeBtn(id,post_user_id)
    {
        this.$inertia.post('/like',{'post_id':id,'user_id':this.$page.props.data_user.id,'post_user_id':post_user_id});
    }
  }
};
</script>

<style></style>
