 <div class="flex items-center min-h-screen bg-white">
     <div class="container mx-auto">
         <div class="max-w-md mx-auto my-10 bg-indigo-50 p-5 rounded-md shadow-sm">
             <div class="text-center">
                 <h1 class="my-3 text-3xl font-semibold">Contact Us</h1>
                 <p class="text-gray-400">Fill up the form below to send us a message.</p>
             </div>
             <div class="m-7">
                 <form action="" method="POST" id="form">

                     <div class="mb-6">
                         <x-jet-label for="email" value="{{ __('Email') }}" />
                         <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email"
                             :value="old('email')" required autofocus />
                     </div>
                     <div class="mb-6">
                         <x-jet-label for="phone" value="{{ __('Phone Number') }}" />
                         <x-jet-input id="phone" class="block mt-1 w-full" type="text" name="phone"
                             :value="old('phone')" required autofocus />
                     </div>

                     <div class="mb-6">
                         <label for="message" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Your
                             Message</label>

                         <textarea rows="5" name="message" id="message" placeholder="Your Message"
                             class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                             required></textarea>
                     </div>
                     <div class="mb-6">
                         <button type="submit"
                             class="w-full px-3 py-4 text-white bg-indigo-500 rounded-md focus:bg-indigo-600 focus:outline-none">Send
                             Message</button>
                     </div>
                     <p class="text-base text-center text-gray-400" id="result">
                     </p>
                 </form>
             </div>
         </div>
     </div>
 </div>
