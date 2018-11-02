<template>
  <div class="container contact-form">
          <div class="contact-image">
              <img src="https://image.ibb.co/kUagtU/rocket_contact.png" alt="rocket_contact"/>
          </div>
          <form @submit.prevent="submitForm" method="post">
              <h3>Drop Us a Message</h3>
             <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                          <input type="text" name="name" class="form-control" v-model="name" placeholder="Your Name *" value="" />
                      </div>
                      <div class="form-group">
                          <input type="text" name="description" v-model="description" class="form-control" placeholder="Your Email *" value="" />
                      </div>
                      <div class="form-group">
                          <button type="submit" class="btn btn-md btn-success" name="button"> Submit </button>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                        <pre>
                          {{output}}
                     </pre>
                      </div>
                  </div>
              </div>
          </form>
</div>
</template>

<script>
    export default {
        data() {
          return {
            name: '',
            description: '',
            output: '',
          };
        },

        methods: {
          submitForm() {
            axios.post('/submit-contact', {
              name: this.name,
              description: this.description
            }).then(response => {
              this.output = response.data;
            }).catch(error => {
              this.output = error
            })
          }
        }
    }
</script>
