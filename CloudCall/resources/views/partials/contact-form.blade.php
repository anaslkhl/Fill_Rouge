<div class="grid grid-cols-2 gap-6 mt-6">

    <!-- Contact Card -->
    <div class="bg-slate-900 rounded-2xl p-6 shadow-lg">
        <h2 class="text-xl font-semibold mb-2">Contact</h2>
        <p class="text-slate-400">John Doe</p>
        <p class="text-slate-400">+212 600 000 000</p>
        <p class="text-slate-400 mt-2">History: Interested in premium plan</p>
    </div>

    <!-- Call Qualification Form -->
    <div class="bg-slate-900 rounded-2xl p-6 shadow-lg">
        <h2 class="text-xl font-semibold mb-4">Call Qualification</h2>
        <form class="space-y-4">
            <div>
                <label class="block text-slate-400 mb-1">Result</label>
                <select class="w-full rounded-lg p-2 bg-slate-800 text-white">
                    <option>Sale</option>
                    <option>Callback</option>
                    <option>Wrong Number</option>
                </select>
            </div>
            <div>
                <label class="block text-slate-400 mb-1">Duration (min)</label>
                <input type="number" class="w-full rounded-lg p-2 bg-slate-800 text-white">
            </div>
            <div>
                <label class="block text-slate-400 mb-1">Notes</label>
                <textarea class="w-full rounded-lg p-2 bg-slate-800 text-white" rows="4"></textarea>
            </div>
            <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white py-2 rounded-lg transition">Validate Call</button>
        </form>
    </div>

</div>