$(function () {
  //編集ボタン(class="js-modal-open")が押されたら発火
  $('.js-modal-open').on('click', function () {
    //modalの中身('class="js-modal")の表示fadeIn
    $('.js-modal').fadeIn();
    //押されたぼったんから投稿内容を取得し変数へ格納する
    var post = $(this).attr('post');
    //押されたボタンから投稿のidを取得し変数へ格納（どの投稿を編集するか特定するのに必要なため）
    var post_id = $(this).attr('post_id');

    //取得した投稿内容をmodalの中身へ渡す
    $('.modal_post').text(post);
    //取得した投稿のidをmodalの中身へ渡す
    $('.modal_id').val(post_id);
    return false;
  });



  // 背景部分や閉じるボタン(js-modal-close)が押されたら閉じる
  $('.js-modal-close').on('click', function () {
    //modalの中身(class="js-modal")を非表示
    $('.js-modal').fadeOut();
    return false;
  });
});

import axios from "axios";

const state = {
  status: null,
};
const getters = {
  status: state => state.status ? state.status : '',
};
const mutations = {
  setStatus(state, status) {
    state.status = status;
  },
};
const actions = {
  async pushFollow(context, data) {
    await axios.post('/api/follow', data).then(result => {
      context.commit('setStatus', result.data);
    }).catch(error => {
      console.log(error);
    })
  },
  async deleteFollow(context, data) {
    await axios.delete('/api/follow', { data: data }).then(result => {
      context.commit('setStatus', result.data);
    }).catch(error => {
      console.log(error);
    })
  },
};

export default {
  namespaced: true,
  state,
  getters,
  mutations,
  actions
}
