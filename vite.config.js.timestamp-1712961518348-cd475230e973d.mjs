// vite.config.js
import { defineConfig } from "file:///D:/example-app/node_modules/vite/dist/node/index.js";
import laravel from "file:///D:/example-app/node_modules/laravel-vite-plugin/dist/index.js";
var vite_config_default = defineConfig({
  plugins: [
    laravel({
      input: ["resources/css/app.css", "resources/css/auth.css", "resources/js/app.js", "resources/js/sendMessage.js", "resources/js/copied.js", "resources/js/etc.js", "resources/css/etc.css"],
      refresh: true
    })
  ],
  server: {
    hmr: true,
    // Enable HMR
    port: 8080,
    // Specify the port if needed
    host: "localhost"
  }
});
export {
  vite_config_default as default
};
//# sourceMappingURL=data:application/json;base64,ewogICJ2ZXJzaW9uIjogMywKICAic291cmNlcyI6IFsidml0ZS5jb25maWcuanMiXSwKICAic291cmNlc0NvbnRlbnQiOiBbImNvbnN0IF9fdml0ZV9pbmplY3RlZF9vcmlnaW5hbF9kaXJuYW1lID0gXCJEOlxcXFxleGFtcGxlLWFwcFwiO2NvbnN0IF9fdml0ZV9pbmplY3RlZF9vcmlnaW5hbF9maWxlbmFtZSA9IFwiRDpcXFxcZXhhbXBsZS1hcHBcXFxcdml0ZS5jb25maWcuanNcIjtjb25zdCBfX3ZpdGVfaW5qZWN0ZWRfb3JpZ2luYWxfaW1wb3J0X21ldGFfdXJsID0gXCJmaWxlOi8vL0Q6L2V4YW1wbGUtYXBwL3ZpdGUuY29uZmlnLmpzXCI7aW1wb3J0IHsgZGVmaW5lQ29uZmlnIH0gZnJvbSAndml0ZSc7XG5pbXBvcnQgbGFyYXZlbCBmcm9tICdsYXJhdmVsLXZpdGUtcGx1Z2luJztcblxuZXhwb3J0IGRlZmF1bHQgZGVmaW5lQ29uZmlnKHtcbiAgICBwbHVnaW5zOiBbXG4gICAgICAgIGxhcmF2ZWwoe1xuICAgICAgICAgICAgaW5wdXQ6IFsncmVzb3VyY2VzL2Nzcy9hcHAuY3NzJywncmVzb3VyY2VzL2Nzcy9hdXRoLmNzcycsICdyZXNvdXJjZXMvanMvYXBwLmpzJywgJ3Jlc291cmNlcy9qcy9zZW5kTWVzc2FnZS5qcycsJ3Jlc291cmNlcy9qcy9jb3BpZWQuanMnLCdyZXNvdXJjZXMvanMvZXRjLmpzJywncmVzb3VyY2VzL2Nzcy9ldGMuY3NzJ10sXG4gICAgICAgICAgICByZWZyZXNoOiB0cnVlLFxuICAgICAgICB9KSxcbiAgICBdLFxuICAgIHNlcnZlcjoge1xuICAgICAgICBobXI6IHRydWUsIC8vIEVuYWJsZSBITVJcbiAgICAgICAgcG9ydDogODA4MCwgLy8gU3BlY2lmeSB0aGUgcG9ydCBpZiBuZWVkZWRcbiAgICAgICBob3N0Oidsb2NhbGhvc3QnXG4gICAgfSxcbiBcbn0pO1xuIl0sCiAgIm1hcHBpbmdzIjogIjtBQUFnTyxTQUFTLG9CQUFvQjtBQUM3UCxPQUFPLGFBQWE7QUFFcEIsSUFBTyxzQkFBUSxhQUFhO0FBQUEsRUFDeEIsU0FBUztBQUFBLElBQ0wsUUFBUTtBQUFBLE1BQ0osT0FBTyxDQUFDLHlCQUF3QiwwQkFBMEIsdUJBQXVCLCtCQUE4QiwwQkFBeUIsdUJBQXNCLHVCQUF1QjtBQUFBLE1BQ3JMLFNBQVM7QUFBQSxJQUNiLENBQUM7QUFBQSxFQUNMO0FBQUEsRUFDQSxRQUFRO0FBQUEsSUFDSixLQUFLO0FBQUE7QUFBQSxJQUNMLE1BQU07QUFBQTtBQUFBLElBQ1AsTUFBSztBQUFBLEVBQ1I7QUFFSixDQUFDOyIsCiAgIm5hbWVzIjogW10KfQo=
