const { defineConfig } = require('@vue/cli-service')
// <<<<<<< HEAD
// module.exports = defineConfig({
//   transpileDependencies: true,

//   pluginOptions: {
//     vuetify: {
// 			// https://github.com/vuetifyjs/vuetify-loader/tree/next/packages/vuetify-loader
// 		}
//   }
// })
module.exports = {
  transpileDependencies: ['vuetify'],
  pluginOptions: {
    vuetify: {
      theme: {}
    }
  }
}
// =======
// module.exports = defineConfig({
//   transpileDependencies: true,

//   pluginOptions: {
//     vuetify: {
// 			// https://github.com/vuetifyjs/vuetify-loader/tree/next/packages/vuetify-loader
// 		}
//   }
// })
// >>>>>>> b3e0702d002067d23c57adb55694b34892f04cdd
